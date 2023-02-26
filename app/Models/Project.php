<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";

    protected $fillable = ['name', 'id_product', 'id_state', 'priority', 'archived'];

    public function tasks(){
        return $this->hasMany( Task::class, 'id_project', 'id' );
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'id_state', 'id');
    }

    public static $rules_create = [
        'name' => 'required | min:5 | unique:projects',
        'id_product' => 'required',
        'id_state' => 'required',
        'priority' => 'required'
    ];

    public static $messages_create = [
        'name.required' => 'El campo Nombre es obligatorio',
        'name.min' => 'El mínimo de caracteres es 5',
        'name.unique' => 'Ya existe un proyecto con este nombre',
        'id_product.required' => 'El campo producto es obligatorio',
        'id_state.required' => 'El campo estado es obligatorio',
        'id_priority.required' => 'El campo prioridad es obligatorio'
    ];

    public static $rules_edit = [
        'name' => 'required | min:5',
        'id_product' => 'required',
        'id_state' => 'required',
        'priority' => 'required',
        'archived' => 'required',
    ];

    public static $messages_edit = [
        'name.required' => 'El campo Nombre es obligatorio',
        'name.min' => 'El mínimo de caracteres es 5',
        'id_product.required' => 'El campo producto es obligatorio',
        'id_state.required' => 'El campo estado es obligatorio',
        'id_priority.required' => 'El campo prioridad es obligatorio',
        'id_priority.archived' => 'El campo archivado es obligatorio'
    ];


}

