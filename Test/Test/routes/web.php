<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data=App\Task::all();
    return view('tasks')->with('tasks',$data);
});

Route::post('/saveTask','TaskController@store');

Route::get('/markascompleted/{id}','TaskController@updateTaskAsCompleted');

Route::get('/markasnotcompleted/{id}','TaskController@updateTaskAsNotCompleted');

Route::get('/deletetask/{id}','TaskController@deleteTask');

Route::get('/updatetaskview/{id}','TaskController@updateTaskView');

Route::post('/updatetask','TaskController@updateTask');