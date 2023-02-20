<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with('tasks')->with('product')->get();
        
        //  FORMATO FECHA
        foreach($projects as $project){
            $project['creado'] = date("d-m-Y", strtotime($project['created_at']));  

            foreach($project['tasks'] as $task){
                $task['user'] = User::find($task['id_user']);
                $task['time'] = Time::find($task['id_time']);
            }
        }

        return Inertia::render('Projects/index', [
            'projects' => $projects
        ]);
    }
}
