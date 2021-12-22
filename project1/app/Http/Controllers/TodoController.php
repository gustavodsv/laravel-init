<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        return view('todo_CRUD.list');
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
