<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    public $fillable = ['title', 'description', 'id_project', 'id_user', 'id_time', 'state'];

    public function user(){
        return $this->hasMany( User::class, 'id_user', 'id' );
    }
    
    public function time(){
        return $this->belongsTo(Time::class, 'id_time', 'id');
    }

    public static $rules = [
        'title' => 'required | min:3 ',
        'id_project' => 'required',
        'id_user' => 'required',
        'id_time' => 'required',
    ];

    public static $messages = [
        'title.required' => 'El campo título es obligatorio',
        'title.min' => 'El mínimo de caracteres es 3',
        'id_project.required' => 'El proyecto es obligatorio',
        'id_user.required' => 'Debe seleccionar un encargado',
        'id_time.required' => 'Debe seleccionar un tiempo',
    ];
}
