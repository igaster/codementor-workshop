<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'tasks' => Task::where('user_id', auth()->user()->id)->get(),
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

    public function complete(Task $task)
    {
        $task->update([
            'is_completed' => true,
        ]);

        return redirect()->back();
    }

    public function restore(Task $task)
    {
        $task->update([
            'is_completed' => false,
        ]);

        return redirect()->back();
    }
}
