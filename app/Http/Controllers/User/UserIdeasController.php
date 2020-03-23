<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserIdeasController extends Controller
{

    public function index()
    {
        return "Lista de las ideas guardadas por el usuario";
    }

    public function store(Request $request)
    {
        return "Guardar esta idea en mi perfil";
    }

    public function destroy($id)
    {
        return "Eliminar esta idea de mi perfil";
    }
}
