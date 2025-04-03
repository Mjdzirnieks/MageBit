<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
    * Display a listing of all tasks.
    */
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all'); // Default filter is 'all'
    
        $tasks = Task::withTrashed()
            ->when($filter === 'active', function ($query) {
                return $query->whereNull('deleted_at'); // Only non-deleted tasks
            })
            ->when($filter === 'completed', function ($query) {
                return $query->where('completed', true); // Only completed tasks
            })
            ->get();
    
        return view('tasks.index', compact('tasks', 'filter'));
    }
    

    /**
    * Show the form for creating a new task.
    */
    public function create()
    {
       return view('tasks.create');
    }

    /**
    * Store a new task in storage.
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Set the default value of 'completed' to true if not provided
        $validatedData['completed'] = $request->has('completed') ? $request->completed : true;

        // Create the new task with the validated data
        Task::create($validatedData);

        return redirect()->route('tasks.index');
    }


    /**
    * Show the form for editing the specified task.
    */
    public function edit(Task $task)
    {
       return view('tasks.edit', compact('task'));
    }

    /**
    * Update the specified task in storage.
    */
    public function update(Request $request, Task $task)
    {
        // Ensure 'completed' is always present
        $request->merge([
            'completed' => $request->has('completed') ? true : false
        ]);
    
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'required|boolean',
        ]);
    
        // Update the task with the validated data
        $task->update($validatedData);
    
        return redirect()->route('tasks.index');
    }
    
    
    

    /**
     * Remove the specified task from storage.
     */
    public function delete(Task $task)
    {
        $task->delete(); // Soft delete the task
        return redirect()->route('tasks.index');
    }

}