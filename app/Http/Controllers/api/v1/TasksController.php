<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\TaskResource;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TasksController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validateTask();
        $task = new Task();
        $task->body = $request->body;
        $task->tasks_list_id = $request->tasks_list_id;
        $task->user_id = Auth::user()->id;
        $task->save();


        $res = [
            'message' => 'Task Created Successfully',
            'data' => $task
        ];

        return response(new TaskResource($res), 201);
    }


    public function show(Request $request)
    {
        $task = Task::find($request->task);
        if (!$task){
            return $this->return404();
        }

        if ($task->user_id != Auth::user()->id){
            return $this->return401();
        }


        return response(new TaskResource($task));
    }


    public function update(Request $request)
    {
        $task = Task::find($request->id);
        if (!$task){
            return $this->return404();
        }

        if ($task->user_id != Auth::user()->id){
            return $this->return401();
        }
        request()->validate(['body' => 'required']);

        $task->body = $request->body;
        $task->update();


        $res = [
            'message' => 'Task Updated Successfully',
            'data' => $task
        ];

        return response(new TaskResource($res));

    }

    public function completeTask(Request $request)
    {
        $task = Task::find($request->task);
        if (!$task){
            return $this->return404();
        }

        if ($task->user_id != Auth::user()->id){
            return $this->return401();
        }

        $task->completed_at = Date::now();
        $task->update();

        return response(new TaskResource([
            'message' => 'Task marked as Complete Successfully',
        ]));

    }


    public function destroy(Request $request)
    {
        $task = Task::find($request->task);
        if (!$task){
            return $this->return404();
        }

        if ($task->user_id != Auth::user()->id){
            return $this->return401();
        }

        $task->delete();

        return response(['message' => 'Task deleted successfully']);
    }


    public function validateTask()
    {
        return request()->validate([
            'body' => 'required',
            'tasks_list_id' => 'required'
        ]);
    }


    public function return404()
    {
        return response(['message' => 'Task does not exist'], 404);
    }

    public function return401()
    {
        return response(['message' => 'Unauthorized Access'], 401);
    }
}
