<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
}
