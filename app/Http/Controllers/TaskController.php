<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $task = [
            'title' => $request->title,
            'week' => $request->week,
            'day' => $request->day,
            'user_id' => $request->user_id,
        ];
        
        Task::create($task);

        return response()->json([
            'message' => 'Task created successfully'
        ]);
    }

    public function view($id)
    {
        return view('tasks/view', [
            'task' => Task::findOrFail($id)
        ]);
    }
}
