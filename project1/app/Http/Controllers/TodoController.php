<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $list = Todo::all();

        return view('todo_CRUD.list', [
            'list' => $list
        ]);
    }

    # Add
    public function add(){
        return view('todo_CRUD.add');
    }

    # Add Action
    public function addAction(Request $request){
        $request->validate([
            'title' => ['required', 'string']
        ]);

        $t = new Todo;
        $t->title = $request->input('title');
        $t->created_at = NOW();
        $t->save();

        return redirect()->route('todo.list');
    }

    # Edit
    public function edit($id){
        $data = Todo::find($id);

        if($data){
            return view('todo_CRUD.edit',[
                'data' => $data
            ]);
        } else {
            return redirect()->route('todo.list');
        }

    }

    # Edit Action
    public function editAction(Request $request, $id){
        $request->validate([
            'newtitle' => ['required', 'string']
        ]);

        Todo::find($id)->update([
            'title'=>$request->input('newtitle'),
            'updated_at'=>NOW()
        ]); // add fillable on Model

        return redirect()->route('todo.list');
    }

    # Delete Action
    public function delete($id){

        Todo::find($id)->delete();

        return redirect()->route('todo.list');
    }

    # Modified Status Action
    public function status($id){

        $t = Todo::find($id);

        if($t){
            $t->status = 1 - $t->status;
            $t->save();
        }

        return redirect()->route('todo.list');
    }

}
