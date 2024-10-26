<?php

namespace App\Http\Controllers;

use App\Models\todoapp;
use Illuminate\Http\Request;

class TodoappController extends Controller
{
    public function index ()
    {
        $todoapps = todoapp::all();

        return view('welcome', [
            'todoapps' =>$todoapps
        ]);
    }

    public function store ()
    {
        $attributes =  request()->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        todoapp::create($attributes);

        return redirect('/');
    }

    public function update(todoapp $todoapp)
    {
        $todoapp->update(['isDone' => true]);

        return redirect('/');
    }

    public function destroy(todoapp $todoapp)
    {
        $todoapp->delete();

        return redirect ('/');
    }
}
