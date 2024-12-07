<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
        ]);
        Task::create($data);
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::withTrashed()->find($id);
        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(Task $task)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
        ]);
        $task->update($data);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function restore($id) {
        Task::withTrashed()->find($id)->restore();
        return redirect()->route('tasks.index');
    }

    public function toggle(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function showCompleted(){
        $tasks = Task::where('is_completed', 1)->get();
        return view('task.index', compact('tasks'));
    }
    public function showNotCompleted(){
        $tasks = Task::where('is_completed', 0)->get();
        return view('task.index', compact('tasks'));
    }
    public function showDeleted(){
        $tasks = Task::onlyTrashed()->get();
        return view('task.index', compact('tasks'));
    }

}
