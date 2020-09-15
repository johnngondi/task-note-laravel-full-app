<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
 * Users Routes
*/
Route::prefix('user')->group(function (){
    Route::post('/login', 'api\v1\LoginController@index');
    Route::post('/', 'api\v1\UsersController@store');
//    Route::get('/', 'api\v1\UsersController@index')->middleware('auth:api');

    Route::get('/profile', 'api\v1\UsersController@show')
        ->middleware('auth:api');

});


/*
 * TasksList Routes
*/
Route::prefix('tasks-lists')->middleware('auth:api')->group(function (){
    Route::get('/', 'api\v1\TasksListsController@index');
    Route::post('/', 'api\v1\TasksListsController@store');
    Route::get('/{tasksList}', 'api\v1\TasksListsController@show');
    Route::post('/update', 'api\v1\TasksListsController@update'); //Change to PATCH or PUT on production
    Route::post('/color', 'api\v1\TasksListsController@changeColor'); //Change to PATCH or PUT on production
    Route::delete('/{tasksList}', 'api\v1\TasksListsController@destroy');
});


/*
 * Task Routes
*/
Route::prefix('task')->middleware('auth:api')->group(function (){
    Route::post('/', 'api\v1\TasksController@store');
    Route::get('/{task}', 'api\v1\TasksController@show');
    Route::post('/update', 'api\v1\TasksController@update'); //Change to PATCH or PUT on production
    Route::post('/{task}', 'api\v1\TasksController@completeTask'); //Change to PATCH or PUT on production
    Route::delete('/{task}', 'api\v1\TasksController@destroy');
});


/*
 * Note Routes
*/
Route::prefix('notes')->middleware('auth:api')->group(function (){
    Route::get('/', 'api\v1\NotesController@index');
    Route::post('/', 'api\v1\NotesController@store');
    Route::get('/{note}', 'api\v1\NotesController@show');
    Route::post('/update', 'api\v1\NotesController@update'); //Change to PATCH or PUT on production
    Route::post('/{note}', 'api\v1\NotesController@changeCategory'); //Change to PATCH or PUT on production
    Route::delete('/{note}', 'api\v1\NotesController@destroy');
});
