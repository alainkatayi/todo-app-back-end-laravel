<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Validator;



class TaskController extends Controller
{
    //fonction pour la creation d'une task
    public function add_task(Request $request){
        //validation des donnees et mise en place des restrinctions
        $validator = Validator::make($request->all(),[
            'title' => 'required | string | max:100',
            'description_task' => 'string | max:500',
            'is_completed' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //si les donnees sont validate, on creer la tache 
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

    public function list_task(){
        return TaskResource::Collection(Task::orderBy('created_at', 'desc')->get());
    }
    

    public function update(Request $request, $id){
        $task = Task::findOrFail($id);

        $validationData = $request->validate([
            'title' => 'required | string | max:100',
            'description_task' => 'string | max:500',
            'is_completed' => 'boolean',
            'start_date' => 'date',
            'end_date' => 'date',

        ]);

        $task->update($validationData);
        return response()->json([
            "message"=> "Article mise à jour"
        ]);
    }

    public function delete( $id){
        $task = Task::findOrFail($id);

        $task->delete();
        return response()->json([
            "message" => "Article supprimé"
        ]);
    }

}
