<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', function(){
    return view('/welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('/test', 'test');



Route::prefix('/config')->group(function(){

    Route::get('/', [ConfigController::class, 'index']);
    Route::post('/', [ConfigController::class, 'index']);
    Route::get('/info', [ConfigController::class, 'info'])->name('info');
    Route::get('/permissions', [ConfigController::class, 'perm'])->name('permi');

});




Route::fallback(function(){
    echo 'Error 404';
});

