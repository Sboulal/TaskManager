<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
      public function apiIndex()
     {
       $tasks = Task::all();
       if($tasks->isEmpty()){
        return response()->json(['message' =>  'No tasks found'], 404);
       }
       return response()->json($tasks, 200);
    }
    public function apiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'in:pending,in_progress,completed'
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);                                            
    }
    public function apiShow($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task, 200);
    }
    public function apiUpdate(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|in:pending,in_progress,completed'
        ]);

        $task->update($request->all());
        return response()->json($task, 200);
    }
    public function apiDestroy($id) 
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
