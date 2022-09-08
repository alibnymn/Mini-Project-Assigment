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

Route::get('project', 'App\Http\Controllers\ProjectController@data');
Route::get('project/add', 'App\Http\Controllers\ProjectController@add');
Route::post('/project','App\Http\Controllers\ProjectController@store');
Route::get('project/edit/{project_id}', 'App\Http\Controllers\ProjectController@edit');
Route::patch('project/{id}', 'App\Http\Controllers\ProjectController@update');
Route::delete('projectDeleteAll', 'App\Http\Controllers\ProjectController@deleteAll');
Route::get('/project/cari', 'App\Http\Controllers\ProjectController@cari');
