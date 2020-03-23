<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTasksController extends Controller
{
    public function index()
    {
        return "Lista de las tareas completas por el usuario";
    }

    public function destroy($id)
    {
        return "Marcar esta tarea como incompleta";
    }
}
