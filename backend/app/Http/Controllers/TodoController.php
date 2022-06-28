<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index() {
        $todos = $this->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request) {
        Todo::create([
            'user_id' => Auth::id(),
            'body' => $request->body,
            'limit' => $request->limit
        ]);
    }

    public function delete($id) {
        Todo::find($id) -> delete();
    }

    public function update(Request $request) {
        Todo::find($request->id) -> update($request->all());
    }

    public function get(){
        $todos = Todo::where('user_id',Auth::id())->get();
        return $todos;
    }
}
