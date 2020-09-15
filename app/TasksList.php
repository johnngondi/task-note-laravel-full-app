<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TasksList extends Model
{
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class)->latest();
    }

    public function recent5Tasks()
    {
        $task = new Task;
        return $task->where('tasks_list_id', $this->id)->limit(5)->latest()->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
