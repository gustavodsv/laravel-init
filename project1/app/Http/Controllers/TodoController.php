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

    public function add(){
        return view('todo_CRUD.add');
    }

    public function addAction(Request $request){
        if($request->filled('title')) {


            DB::insert('INSERT INTO todo (title, date) VALUES (:title, :date)', [
                'title' => $request->input('title'),
                'date' => NOW()
            ]);

            return redirect()->route('todo.list');
        } else {
            return redirect()->route('todo.add')->with('warning', 'Empty field');
        }
    }

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

    public function editAction(Request $request, $id){
        if($request->filled('newtitle')){
            $title = $request->input('newtitle');
            $data = DB::select('SELECT * FROM todo WHERE id = :id', [
                'id' => $id
            ]);

            if(count($data) > 0){

                DB::update('UPDATE todo SET title = :title WHERE id = :id', [
                    'id' => $id,
                    'title' => $title
                ]);
            }

            return redirect()->route('todo.list');

        } else {
            return redirect()->route('todo.edit', ['id' => $id])->with('warning', 'Empty field');
        }
    }

    public function delete(){

    }

    public function status(){

    }

}
