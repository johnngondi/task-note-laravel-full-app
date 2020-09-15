<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\TasksListResource;
use App\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksListsController extends Controller
{

    public function index()
    {
        $tasksLists = Auth::user()->tasksLists;
        return response(TasksListResource::collection($tasksLists));
    }


    public function store(Request $request)
    {
        $this->validateList();
        $list = new TasksList(request(['title', 'color']));
        $list->user_id = Auth::user()->id;
        $list->save();

        $res = [
            'message' => 'Tasks List Created Successfully',
            'data' => $list
        ];

        return response(new TasksListResource($res), 201);
    }


    public function show()
    {
        $tasksList = TasksList::find(request('tasksList'));
        if (!$tasksList){
            return $this->return404();
        }

        if ($tasksList->user_id != Auth::user()->id){
            return $this->return401();
        }

        $tasksList->tasks;

        return response($tasksList);
    }


    public function update()
    {
        $this->validateList();
        $list = TasksList::find(request('id'));
        if (!$list){
            return $this->return404();
        }

        if ($list->user_id != Auth::user()->id){
            return $this->return401();
        }

        $list->title = request('title');
        $list->color = request('color');
        $list->update();

        $res = [
            'message' => 'Tasks List Updated Successfully',
            'data' => $list
        ];

        return response(new TasksListResource($res));
    }

    public function changeColor()
    {
        $list = TasksList::find(request('id'));
        if (!$list){
            return $this->return404();
        }

        if ($list->user_id != Auth::user()->id){
            return $this->return401();
        }

        $list->color = request('color');
        $list->update();

        $res = [
            'message' => 'Tasks List Color changed Successfully'
        ];
        return response(new TasksListResource($res));
    }


    public function destroy()
    {
        $tasksList = TasksList::find(request('tasksList'));
        if (!$tasksList){
            return $this->return404();
        }

        if ($tasksList->user_id != Auth::user()->id){
            return $this->return401();
        }

        $tasksList->delete();

        return response(['message' => 'Tasks List deleted successfully']);
    }

    public function validateList()
    {
        return request()->validate([
            'title' => 'required',
        ]);
    }

    public function return404()
    {
        return response(['message' => 'Task List does not exist'], 404);
    }

    public function return401()
    {
        return response(['message' => 'Unauthorized Access'], 401);
    }
}
