<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatusModel extends Model
{
    use HasFactory;

    protected $table = "task_status";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function Tasks() {
        return $this->hasMany('App\Models\TaskModel','status','id');
    }
}
