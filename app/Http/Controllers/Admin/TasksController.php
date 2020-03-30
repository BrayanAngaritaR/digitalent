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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ideas = Idea::latest()->take(20)->get();
        $steps = Step::all();
        return view('admin.tasks.create', compact('ideas', 'steps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasks = $request->title;

        if($tasks)
        {
            //Guarda todas las tareas asignadas
            foreach($tasks as $task) {
                $data = array(
                    'title' => $task,
                    'idea_id' => $request->idea_id,
                    'step_id' => $request->step_id
                );
                Task::updateOrCreate($data);    
            }

            return back();
            toast('Se han asignado las tareas a la idea', 'success');

        } else {
            return back();
            toast('Ha ocurrido un error', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
