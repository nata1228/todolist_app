<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/todo',[TodoController::class,'index'])->name('todo.index');
Route::get('/todo/{id}',[TodoController::class,'edit'])->name('todo.edit');
Route::post('/todo/store',[TodoController::class,'store'])->name('todo.store');
Route::post('/todo/delete/{id}',[TodoController::class,'delete'])->name('todo.delete');