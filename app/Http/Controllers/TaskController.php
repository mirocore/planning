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
}
