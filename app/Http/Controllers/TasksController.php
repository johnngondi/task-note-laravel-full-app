<?php

namespace App\Http\Controllers;

use App\Task;
use App\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validateTask();
        $task = new Task();


        $task->body = $request->title;
        $task->tasks_list_id = $request->tasks_list_id;
        $task->user_id = Auth::user()->id;

        $task->save();

        return redirect(route('tasks-lists.show', $request->tasks_list_id));
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::user()->id){
            return response(['message' => 'Not Authorized'],401);
        }

        $task->markAsComplete();

        return response(['message' => 'Task Completed']);
    }

    public function destroy(Request $request)
    {
        $task = Task::find($request->id);

        if ($task->user_id !== Auth::user()->id){
            return response(['message' => 'Not Authorized'],401);
        }

        $task->delete();

        return response(['message' => 'Task Deleted']);
    }

    public function validateTask()
    {
        return request()->validate([
            'title' => 'required',
            'tasks_list_id' => 'required'
        ]);
    }
}
