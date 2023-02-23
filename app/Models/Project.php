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
}
