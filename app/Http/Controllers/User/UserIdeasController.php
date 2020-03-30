<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIdeasController extends Controller
{

    public function index()
    {
        //$ideas = UserIdea::where('user_id', Auth::id())->get();
        $ideas = Auth::user()->ideas;
        return view('user.profile.ideas.index', compact('ideas'));
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
