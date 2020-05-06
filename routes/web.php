<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('projects', 'ProjectController');
    Route::resource('tasks', 'TaskController');

    /* Task Project route*/
    Route::get('{project}/addTask', 'ProjectController@add_task_get')->name('add.project.task.get');
    Route::post('{project}/addTask', 'ProjectController@add_task_post')->name('add.project.task.post');


    /*updating priority in the database*/
    Route::post('{project}/updatePriority', 'ProjectController@updatePriority')->name('updatePriority');
});
