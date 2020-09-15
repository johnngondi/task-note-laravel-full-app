<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Task extends Model
{

    protected $guarded = [];

    public function taskList()
    {
        return $this->belongsTo(TasksList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function markAsComplete()
    {
        $this->completed_at = Date::now();
        $this->update();
    }
}
