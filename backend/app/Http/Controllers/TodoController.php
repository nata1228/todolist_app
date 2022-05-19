<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::where('user_id',Auth::id())->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request) {
        \Log::debug($request);
        $todo = new Todo();
        $todo->user_id = Auth::id();
        $todo->body = $request->body;
        $todo->limit = $request->limit;
        $todo->save();
        $todos =  Todo::where('user_id',Auth::id())->get();
        return $todos;
    }

    public function edit($id) {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/todo');
    }

    public function update(Request $request) {
        $todo = Todo::find($request->input('id'));
        $todo->body = $request->input('body');
        $todo->limit = $request->input('limit');
        $todo->save();
        return redirect('/todo');
    }

    public function info(Request $request){
        return response()->json($request->body);
    }

    public function get(){
        $todos = Todo::where('user_id',Auth::id())->get();
        return $todos;
    }
}
