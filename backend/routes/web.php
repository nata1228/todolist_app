<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'todo'], function() {
    Route::get('/',[TodoController::class,'index'])->name('todo.index');
    Route::get('get',[TodoController::class,'get'])->name('todo.get');
    Route::post('store',[TodoController::class,'store'])->name('todo.store');
    Route::post('delete/{id}',[TodoController::class,'delete'])->name('todo.delete');
    Route::post('update',[TodoController::class,'update'])->name('todo.update');
});