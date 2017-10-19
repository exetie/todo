<?php

/* 
 * All the routes for the package will be defined here.
 */


Route::group(['middleware' => ['web']], function () {
    Route::post('todo/{task_id}/completed', '\Tareque\Todo\Http\Controllers\Todo\TodoController@completed');
    Route::resource('todo', '\Tareque\Todo\Http\Controllers\Todo\TodoController');
});


