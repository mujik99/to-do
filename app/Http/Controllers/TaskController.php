<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = TaskModel::all();
        return $tasks;
    }

    public function create(Request $request)
    {
        try {
            //todo: need add validation in model
            $taskModel = new TaskModel();
            $taskModel->fill($request->post());
            $taskModel->status = 1;
            if($taskModel->save()) {
                return $taskModel;
            }
        } catch (\Exception $exception) {
            return response($exception->getMessage(), '500');
        }
        return response('something went wrong', 500);
    }

    public function delete(Request $request)
    {
        try {
            $task = TaskModel::find($request->id);
            if($task->delete()) {
                return $request->id;
            }

        } catch (\Exception $exception) {
            return response($exception->getMessage(), '500');
        }
        return response('something went wrong', 500);
    }

    public function changeStatus(Request $request)
    {
        try {
            $task = TaskModel::find($request->id);
            if ($request->status === 2) {
                $task->status = 1;
            }else {
                $task->status = 2;
            }
            if ($task->save()) {
                return $task;
            }

        } catch (\Exception $exception) {
            return response($exception->getMessage(), '500');
        }
        return response('something went wrong', 500);
    }
}
