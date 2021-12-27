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

    public function edit(){
        return view('todo_CRUD.edit');
    }

    public function editAction(){

    }

    public function delete(){

    }

    public function status(){

    }

}
