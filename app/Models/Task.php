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
}
