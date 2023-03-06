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
        return redirect()->back()->with('avisoFlash', [
            "type" => "success",
            "message" => "Se ha creado"
        ]);
    }

    public function store(Request $request){
        
        // VALIDACION
        $request->validate(Task::$rules, Task::$messages);
        
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

    public function destroy(Task $task){
        //TODO VALIDAR SI EXISTE
        
        // BORRAR REGISTRO
        $task->delete();

        return redirect()->back()->with('avisoFlash', [
            "type" => "success",
            "message" => "Se ha eliminado exitosamente la tarea: '" .  $task->title  . "'"
        ]);
    }


    public function update(Task $task, Request $request){
       // VALIDACION
       $request->validate(Task::$rules, Task::$messages);
       
        // OBTENGO LOS DATOS
       $data = $request->input();

       // ACTUALIZO EL REGISTRO
       $task->update( $data );
    }
}


