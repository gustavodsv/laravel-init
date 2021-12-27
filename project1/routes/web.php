<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

Auth::routes();

Route::get('/', function(){
    return view('/welcome');
});

Route::redirect('/', '/todo');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('/test', 'test');


Route::prefix('/todo')->group(function() {

    Route::get('/', [TodoController::class, 'index'])->name('todo.list');

    Route::get('/add', [TodoController::class, 'add'])->name('todo.add');
    Route::post('/add', [TodoController::class, 'addAction']);

    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/edit/{id}', [TodoController::class, 'editAction']);

    Route::get('/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
    Route::get('/status/{id}', [TodoController::class, 'status'])->name('todo.status');

});


Route::prefix('/config')->group(function() {

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('/info', [ConfigController::class, 'info'])->name('info');
    Route::get('/permissions', [ConfigController::class, 'perm'])->name('permi');

});

Route::fallback(function(){
    echo 'Error 404';
});

