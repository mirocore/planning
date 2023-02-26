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

        return Inertia::render('Projects/index', [
            'projects' => $projects
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

        // TODO MENSAJE WITH
        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        //TODO VALIDAR SI EXISTE
        
        // BORRAR REGISTRO
        $project->delete();

        return redirect()->back();
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
        // TODO MENSAJE FLASH
        return redirect()->route('project.index');
    }
}
