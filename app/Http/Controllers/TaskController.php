<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();

        return view('dashboard', [
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        Task::create([
            'message' => $request->get('message'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
