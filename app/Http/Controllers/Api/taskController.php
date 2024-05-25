<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    //
    public function getTasks(){
        $tasks = Task::all();

        if($tasks->isEmpty()){
            $data = [
                'tasks'=> $tasks,
                'message'=> 'There are no tasks',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        
        $data = [
            'tasks'=> $tasks,
            'Status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'idUser' => 'required',
            'title' => 'required',
            'description' => 'required',
            'idStatus' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'validation fails',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $task = Task::Create($request->all());
        return response()->json([
            'message'=> 'task crated',
            'task' => $task
        ], 201);
    }

    public function destroy(){
        return "destroy";
    }

    public function getWhere($nombreCol, $valor){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $task = Task::where($nombreCol, $valor)->get();
            return $task;
        }
        
        return response()->json([
            'message' => 'method not valid'
        ], 500);
    }

    public function update(){
        return "updateOne";
    }

    public function updateParcial(){
        return "updateParcial";
    }
}


