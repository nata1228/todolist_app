<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request) {
        $todo = new Todo();
        $todo->body = $request->input('body');
        $todo->limit = $request->input('limit');
        $todo->save();
        return redirect('/todo');
    }

    public function edit($id) {
        $todo = Todo::find('$id');
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
}
