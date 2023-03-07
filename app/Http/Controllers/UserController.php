<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Time;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){


        $users = User::latest()->with('tasks')->orderBy('id_role')->orderBy('name')->get();

        // Cantidad de tareas
        foreach($users as $user){
            $user["amountTasks"] = count($user->tasks);
        }

        return Inertia::render('Usuarios/index', [
            'users' => $users
            ]
        );
    }

    public function show(User $user){


        // TASKS
        $tasks = Task::latest()
                    ->with('time', 'project')
                    ->where("id_user", $user->id)
                    ->where("state", "0")
                    ->get();
        
        // PRODUCT
        foreach($tasks as $task){
            $task['product'] = $task['project']->product;
        }

        //TIMES
        $times = Time::all();

       return Inertia::render('Usuarios/show',[
        'data' => $user,
        'tasks' => $tasks,
        'times' => $times
       ]); 
    }
}
