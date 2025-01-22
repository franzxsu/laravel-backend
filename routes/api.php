<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//task deadlines?

Route::get('/test', function () {
    return response()->json(['message' => 'hello!']);
});

//get the tasks
Route::get('/tasks', [TaskController::class, 'index']);

//create a task
Route::post('/tasks', [TaskController::class, 'store']);

//UPDATE A TASK (can be reused to REASSIGN TASK to an employee)
Route::post('/updatetask', [TaskController::class, 'update']);

//get tasks of a given user
Route::get('/mytasks', [TaskController::class, 'getMyTasks']);

//delete a task
Route::delete('/remove', [TaskController::class, 'deleteTask']);