<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    // SORTING functionality
    public function indexWithSorting(Request $request) {
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $filter = $request->get('filter', 'all'); // Default to showing all tasks

        // Validate the sorting criteria to prevent SQL injection
        $validColumns = ['title', 'description', 'created_at', 'isDone'];
            if (!in_array($sortBy, $validColumns)) {
                $sortBy = 'created_at';
            }

        // Get the todos with sorting and filtering
        if ($filter == 'completed') {
            $todos = Todo::where('isDone', true)->orderBy($sortBy, $sortOrder)->get();
        } elseif ($filter == 'incomplete') {
            $todos = Todo::where('isDone', false)->orderBy($sortBy, $sortOrder)->get();
        } else {
            // Show all tasks
            $todos = Todo::orderBy($sortBy, $sortOrder)->get();
        }
    
        return view('welcome', ['todos' => $todos]);
    }
 

    
    //Split functionality from routes in web.php
    public function index(){
        $todos = Todo::all();

        return view('welcome', ['todos' => $todos]);
    }



    //Validating the fields
    public function store(Request $request) {
        $attributes = $request->validate([
            'title' => 'required', 
            'description' => 'required',
            'due_date' => 'date'
    ]);

                // Adding the current date and time to the attributes
                $attributes['created_at'] = now();

                Todo::create($attributes);

                return redirect('/');
}



    // UPDATING a list item's status
    public function update(Request $request, Todo $todo)
    {
        // If 'isDone' is present in the request, update the status
        if ($request->has('isDone')) {
            $todo->update(['isDone' => true]);
        } else {
            // Otherwise, validate and update the title and description
            $attributes = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'due_date' => 'required|date',
            ]);
    
            $todo->update($attributes);
        }
    
        return redirect('/');
    }
    

    // DELETING a list item
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect('/');
    }

    // EDIT an item
    public function edit(Todo $todo)
{
    return view('edit', ['todo' => $todo]);
}

//toggle Status for CHECK button
    public function toggleStatus(Todo $todo) {
        $todo->update(['isDone' => !$todo->isDone]);

        return redirect('/');
}
}