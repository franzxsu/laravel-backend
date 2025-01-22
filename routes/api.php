<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//task deadlines?
//supervisors can see all tasks?

//logging of tasks!!

Route::get('/test', function () {
    return response()->json(['message' => 'hello!']);
});

//get the tasks
Route::get('/tasks', [TaskController::class, 'index']);

//create a task - maybe HEAD will use this the most
    /**
     * task_name | string
     * task_description | description
     * employee_id | int (this is not required)
     * stats' => 'Completed, On Hold, Pending'
     */
Route::post('/tasks', [TaskController::class, 'store']);

//-maybe change to "put"
Route::post('/assign', [TaskController::class, 'assignTask']);

//UPDATE A TASK (can be reused to REASSIGN TASK to an employee)
Route::post('/updatetask', [TaskController::class, 'update']);

//get tasks of a given user
Route::get('/mytasks', [TaskController::class, 'getMyTasks']);

//delete a task
Route::delete('/remove', [TaskController::class, 'deleteTask']);