<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\State;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::latest()->with('tasks')->with('product', 'state')->get();

        //  FORMATO FECHA
        foreach($projects as $project){
            $project['creado'] = date("d-m-Y", strtotime($project['created_at']));  

            foreach($project['tasks'] as $task){
                $task['user'] = User::find($task['id_user']);
                $task['time'] = Time::find($task['id_time']);
            }
        }

        // DATOS PARA EL FORMULARIO
        $states = State::all();
        $users = User::all();
        $times = Time::all();

        return Inertia::render('Projects/index', [
            'projects' => $projects,
            'states' => $states,
            'users' => $users,
            'times' => $times
        ]);
    }

    public function create(){

        $products = Product::all();
        $states = State::all();

        return Inertia::render('Projects/formCreate', [
            "products" => $products,
            "states" => $states
        ]);
    }

    public function store(Request $request){

        // VALIDACION
        $request->validate(Project::$rules_create, Project::$messages_create);

        // OBTENGO LOS DATOS
        $data = $request->input();

        // NUEVO REGISTRO
        $newProject = Project::create($data);

        // VOLVER AL LISTADO
        return redirect()->route('project.index')->with('avisoFlash', [
            "newProject" => $newProject
        ]);
    }

    public function destroy(Project $project)
    {
        //TODO VALIDAR SI EXISTE
        
        // BORRAR REGISTRO
        $project->delete();

        return redirect()->back()->with('avisoFlash', [
            "type" => "success",
            "message" => "Se ha eliminado exitosamente el proyecto: '" .  $project->name  . "'"
        ]);
    }

    public function edit(Project $project)
    {

        $products = Product::all();
        $states = State::all();

        return Inertia::render('Projects/formEdit', [
            "products" => $products,
            "states" => $states,
            "project" => $project
        ]);
    }

    public function update(Request $request, Project $project)
    {

        // VALIDACION
        $request->validate(Project::$rules_edit, Project::$messages_edit);

        // OBTENGO LOS DATOS
        $data = $request->input();

        // ACTUALIZO EL REGISTRO
        $project->update( $data );

        // RETORNO AL LISTADO
        return redirect()->route('project.index')->with('avisoFlash', [
            "type" => "success",
            "message" => "Se ha editado exitosamente el proyecto: '" .  $project->name  . "'"
        ]);
    }
}
