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

    public function addAction(){

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
