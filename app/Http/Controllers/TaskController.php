<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'required|string',
            'employee_id' => 'integer', //NOT REQUIRED!!
            'stats' => 'required|string',
        ]);

        $task = Task::create($validated);

        return response()->json([
            'message' => 'TASK CREATED SUCCESFULLY',
            'task' => $task
        ], 201);//success 201
    }
    public function update(Request $request)
    {

        //if no task is found (ie the task id does not exist)
        // if (!$task) {
        //     return response()->json(['message' => 'task does not exist'], 404);
        // }

        //validate (todo make separate method)
        $validated = $request->validate([
            'task_id' => 'required|integer|exists:housekeeping_tasks,employee_id',
            'task_name' => 'nullable|string|max:255',
            'task_description' => 'nullable|string',
            'employee_id' => 'nullable|integer',
            'stats' => 'nullable|string',
        ]);

        $task = Task::find($validated['task_id']);

        if (!$task) {
            return response()->json(['message' => 'the task does not exist'], 404);
        }

        //update the field
        if ($request->has('task_name')) {
            $task->task_name = $validated['task_name'];
        }
        if ($request->has('task_description')) {
            $task->task_description = $validated['task_description'];
        }

        if ($request->has('employee_id')) {
            $task->employee_id = $validated['employee_id'];
        }

        if ($request->has('stats')) {
            $task->stats = $validated['stats'];
        }

        $task->save();

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
        ]);
    }

    public function getMyTasks(Request $request)
    {
        //validate that employee id exists in the databse
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:employees,employee_id',
        ]);

        //get tasks with given employee id, sorted by "updated_at"
        $tasks = Task::where('employee_id', $validated['employee_id'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json($tasks);
    }
    public function deleteTask(Request $request)
    {
        
    }
}
