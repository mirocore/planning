<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function changeState(Task $task){
        
        /* Condicional */
        if( $task['state'] === 0 ){
            $task['state'] = 1;
        }else{
            $task['state'] = 0;
        }

        /* Guardar */
        $task->save();
        
        /* TODO Return with mensaje */
        return redirect()->back();
    }

    public function store(Request $request){
        // VALIDACION SI ES QUE SE PUEDE
        
        // DATOS
        $data =  $request->input();
        
        // INSERTAR REGISTRO
        $newTask = Task::create($data);

        // VOLVER AL LISTADO
        return redirect()->route('project.index')->with('avisoFlash', [
            "type" => "success",
            "message" => "Se ha creado exitosamente la tarea: '" .  $newTask->title  . "'"
        ]);
    }
}
