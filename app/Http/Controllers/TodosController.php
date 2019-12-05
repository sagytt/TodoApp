<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class TodosController extends Controller
{
    //

    public function index()
    {
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        if(!empty($request->todo))
        {
            $todo = new Todo;
            $todo->todo = $request->todo;
            $todo->save();
            session()->flash('success', 'Your todo was Created!');
            return redirect()->back();
        }else
        {
            session()->flash('success', 'Your have to put some value');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        session()->flash('success', 'Your todo was Deleted!');
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        //dd($request->all()); //To check
        $todo = Todo::find($id);
        $todo->todo = $request->todo; //saving what i'm getting form the update
        $todo->save();
        session()->flash('success', 'Your todo was Saved!');
        return redirect()->route('todos');
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        session()->flash('success', 'Your todo was Marked as Completed!');
        return redirect()->back();
    }

    public function revert($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 0;
        $todo->save();
        session()->flash('success', 'Your todo was Reverted! ');
        return redirect()->back();
    }
}
