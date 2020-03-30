<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Step;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function create()
    {
        $ideas = Idea::latest()->take(20)->get();
        $steps = Step::all();
        return view('admin.tasks.create', compact('ideas', 'steps'));
    }

    public function store(Request $request)
    {
        $tasks = $request->title;

        if($tasks)
        {
            //Guarda todas las tareas asignadas
            foreach($tasks as $s) {
                Task::create([
                    'title' => $s,
                    'idea_id' => $request->idea_id,
                    'step_id' => $request->step_id
                ]);  
            }   

            toast('Se han asignado las tareas a la idea', 'success');
            return back();

        } else {
            return back();
            toast('Ha ocurrido un error', 'error');
        }
    }
}
