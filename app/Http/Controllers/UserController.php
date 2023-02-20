<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){

        $users = User::latest()->orderBy('id_role')->orderBy('name')->get();

        return Inertia::render('Usuarios/index', [
            'users' => $users]
        );
    }
}
