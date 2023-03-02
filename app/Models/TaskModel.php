<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;

    protected $table = "task";

    protected $fillable = ['title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function TaskStatus() {
        return $this->hasOne('App\Models\TaskStatusModel','id','status');
    }
}
