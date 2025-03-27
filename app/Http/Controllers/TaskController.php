<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;


class TaskController extends Controller
{
    //fonction pour la creation d'une task
    public function store(Request $request){
        $validator = $request -> validate([
            'title' => 'required | string | max:100',
            'description_task' => 'string | max:500',
            'is_completed' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = Task::create([
            'title' => $validator['title'],
            'description_task' => $validator['description_task'],
            'is_completed' => $validator['is_completed'],
            'start_date' => $validator['start_date'],
            'end_date' => $validator['end_date'],
            'user_id' => $validator['user_id'],
        ]);

        return new TaskResource($task);
    }

    public function storex(){
        return TaskResource::Collection(Task::all());
    }
}
