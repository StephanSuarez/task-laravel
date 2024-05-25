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
            'userID' => 'required',
            'taskName' => 'required|email',
            'description ' => 'required',
            'status' => 'required'
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
            $task
        ], 201);
    }
}


