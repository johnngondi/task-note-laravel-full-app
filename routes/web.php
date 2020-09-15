<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()) {
        return redirect(\route('tasks-lists.index'));
    } else {
        return redirect(\route('login'));
    }
});

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::get('tasks-lists', 'TasksListsController@index')->name('tasks-lists.index');
    Route::post('tasks-lists', 'TasksListsController@store')->name('tasks-lists.store');
    Route::get('tasks-lists/{tasksList}', 'TasksListsController@show')->name('tasks-lists.show');
    Route::put('tasks-lists/{tasksList}', 'TasksListsController@update')->name('tasks-lists.update');
    Route::delete('tasks-lists/{tasksList}', 'TasksListsController@destroy')->name('tasks-lists.destroy');
    Route::post('tasks', 'TasksController@store')->name('tasks.store');
    Route::delete('tasks', 'TasksController@destroy')->name('tasks.destroy');
    Route::put('tasks/{task}', 'TasksController@update')->name('tasks.update');

    Route::get('notes', 'NotesController@index')->name('notes.index');
    Route::post('notes', 'NotesController@store')->name('notes.store');
    Route::get('note/{note}', 'NotesController@show')->name('notes.show');
    Route::put('note/{note}', 'NotesController@update')->name('notes.update');
    Route::delete('note/{note}', 'NotesController@destroy')->name('notes.destroy');

    Route::delete('user/{user}', function (User $user) {
        if ($user->id !== Auth::user()->id){
            return redirect(route('login'));
        }

        $user->delete();

        return redirect(route('login'));

    })->name('users.destroy');

    Route::get('about', function () {
        return view('extra.about');
    });
});

