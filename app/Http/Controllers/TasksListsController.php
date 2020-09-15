<?php

namespace App\Http\Controllers;

use App\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksListsController extends Controller
{

    public function index()
    {
        $tasksLists = TasksList::where('user_id', Auth::user()->id)->latest()->get();
        $tasksListsFull = [];
        foreach ($tasksLists as $tasksList) {
            $tasks = [];
            foreach ($tasksList->recent5Tasks() as $recent5Task) {
                $task = [
                    'body' => $recent5Task->body,
                    'completed_at' => $recent5Task->completed_at
                ];

                array_push($tasks, $task);
            }

            $taskList = [
                'id' => $tasksList->id,
                'title' => $tasksList->title,
                'color' => $tasksList->color,
                'tasks' => $tasks
            ];

            array_push($tasksListsFull, $taskList);

        }


        return view('tasks-lists.index', [
            'tasksLists' => $tasksListsFull
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validateList();
        $tasksList = new TasksList();

        $tasksList->title = $request->title;
        $tasksList->color = $request->color;
        $tasksList->user_id = Auth::user()->id;

        $tasksList->save();

        return redirect(route('tasks-lists.index'));

    }


    public function show(TasksList $tasksList)
    {
        return view('tasks-lists.show', [
            'tasksList' => $tasksList
        ]);
    }


    public function update(Request $request, TasksList $tasksList)
    {
        $tasksList->color = $request->color;
        $tasksList->update();

        return response([
            'messaage' => 'ok'
        ]);
    }


    public function destroy(TasksList $tasksList)
    {
        if ($tasksList->user_id !== Auth::user()->id){
            return response(['message' => 'Not Authorized'],401);
        }

        $tasksList->delete();

        return redirect(route('tasks-lists.index'));
    }


    public function validateList()
    {
        return request()->validate([
            'title' => 'required',
        ]);
    }
}
