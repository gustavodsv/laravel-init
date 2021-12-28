<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(){
        $list = DB::select('SELECT* FROM todo');

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

        DB::insert('INSERT INTO todo (title, created_at) VALUES (:title, :date)', [
            'title' => $request->input('title'),
            'date' => NOW()
        ]);

        return redirect()->route('todo.list');
    }

    # Edit
    public function edit($id){
        $data = DB::select('SELECT * FROM todo WHERE id = :id', [
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('todo_CRUD.edit',[
                'data' => $data[0]
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

        DB::update('UPDATE todo SET title = :title, updated_at = NOW() WHERE id = :id', [
            'id' => $id,
            'title' => $request->input('newtitle')
        ]);

        return redirect()->route('todo.list');
    }

    # Delete Action
    public function delete($id){
        DB::delete('DELETE FROM todo WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('todo.list');
    }

    # Modified Status Action
    public function status($id){
        DB::update('UPDATE todo SET status = 1 - status WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('todo.list');
    }

}
