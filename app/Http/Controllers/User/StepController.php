<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Task;
use App\Models\UserIdea;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class StepController extends Controller
{
    public function saveStep1(Request $request, Idea $idea)
    {
        $validator = Validator::make(request()->all(), [
            'tasks' => 'required',
            'tasks.*' => 'required|numeric',
        ]);

    	$tasks = $request->tasks;
        $user = Auth::id();

		if($tasks)
        {
            //Guarda todas las tareas realizadas por el usuario
            foreach($tasks as $task) {
                $data = array(
                    'idea_id' => $idea->id,
                    'task_id' => $task,
                    'step_id' => 1,
                    'user_id' => auth()->user()->id
                );
                UserTask::updateOrCreate($data);    
            }

            //Localizar la idea guarda por el usuario
            $user_idea = UserIdea::where('user_id', $user)
                        ->where('idea_id', $idea->id)->first();

            //Se asigna el nuevo progreso en 33%
            if ($user_idea->progress < 33) {
                $user_idea->progress = 33;

                //Se actualiza el progreso de 0 a 33%
                $user_idea->update();
            }

            toast('Se ha guardado tu progreso', 'success');

        } else {
            return back();
            toast('No has seleccionado ninguna tarea', 'error');
        }

		return redirect()->route('user.ideas.get.step2', $idea);

    }

    public function getStep2(Idea $idea)
    {

        //Si el progreso es 33 entonces podrá continuar sino no
        $progress = Auth::user()->progress($idea);
        if($progress)
        {
            if($progress->progress == 0)
            {
                toast('Debes completar las tareas primero', 'error');
                return redirect()->route('user.ideas.show', $idea);
            }

            if($progress->progress >= 33){

                $resources = Resource::where('idea_id', $idea->id)
                ->where('step_id', 2)->get();

                $tasks = Task::where('idea_id', $idea->id)
                        ->where('step_id', 2)->get();

                $user_tasks = UserTask::where('idea_id', $idea->id)
                    ->where('user_id', auth()->id())
                    ->where('step_id', 2)->pluck('task_id');

                return view('user.includes.steps.2', 
                    compact([
                        'idea', 
                        'resources', 
                        'tasks',
                        'user_tasks'
                    ])
                );

            }
        } else {
            toast('Debes comenzar por aquí', 'error');
            return redirect()->route('user.ideas.show', $idea);
        }
    }

    public function saveStep2(Request $request, Idea $idea)
    {
        $validator = Validator::make(request()->all(), [
            'tasks' => 'required',
            'tasks.*' => 'required|numeric',
        ]);

    	$tasks = $request->tasks;
        $user = Auth::id();

    	if($tasks)
    	{
    		foreach($tasks as $task) {
				$data = array(
					'idea_id' => $idea->id,
					'task_id' => $task,
					'step_id' => 2,
					'user_id' => auth()->user()->id
				);
				UserTask::updateOrCreate($data);    
			}

            //Localizar la idea guarda por el usuario
            $user_idea = UserIdea::where('user_id', $user)
                        ->where('idea_id', $idea->id)->first();

            //Se asigna el nuevo progreso en 66%
            if ($user_idea->progress < 66) {
                $user_idea->progress = 66;

                //Se actualiza el progreso de 0 a 66%
                $user_idea->update();
            }

            toast('Se ha guardado tu progreso', 'success');

	    } else {
	    	toast('No has seleccionado ninguna tarea', 'error');
	    }
		
		return redirect()->route('user.ideas.get.step3', $idea);

    }

    public function getStep3(Idea $idea)
    {

        //Si el progreso es 66 entonces podrá continuar sino no
        $progress = Auth::user()->progress($idea);
        if($progress)
        {
            if($progress->progress == 0)
            {
                toast('Debes completar las tareas primero', 'error');
                return redirect()->route('user.ideas.show', $idea);
            }

            if($progress->progress >= 66){

                $resources = Resource::where('idea_id', $idea->id)
                ->where('step_id', 3)->get();

                $tasks = Task::where('idea_id', $idea->id)
                        ->where('step_id', 3)->get();

                $user_tasks = UserTask::where('idea_id', $idea->id)
                    ->where('user_id', auth()->id())
                    ->where('step_id', 3)->pluck('task_id');

                return view('user.includes.steps.3', 
                    compact([
                        'idea', 
                        'resources', 
                        'tasks',
                        'user_tasks'
                    ])
                );

            } else {
                toast('Debes completar las tareas primero', 'error');
                return redirect()->route('user.ideas.get.step2', $idea);
            }

        } else {
            toast('Debes comenzar por aquí', 'error');
            return redirect()->route('user.ideas.show', $idea);
        }   
    }

    public function saveStep3(Request $request, Idea $idea)
    {
        $validator = Validator::make(request()->all(), [
            'tasks' => 'required',
            'tasks.*' => 'required|numeric',
        ]);

    	$tasks = $request->tasks;
        $user = Auth::id();

		if($tasks)
    	{
    		foreach($tasks as $task) {
				$data = array(
					'idea_id' => $idea->id,
					'task_id' => $task,
					'step_id' => 3,
					'user_id' => auth()->user()->id
				);
				UserTask::updateOrCreate($data);    
			}

            //Localizar la idea guarda por el usuario
            $user_idea = UserIdea::where('user_id', $user)
                        ->where('idea_id', $idea->id)->first();

            //Se asigna el nuevo progreso en 100%
            $user_idea->progress = 100;

            //Se actualiza el progreso de 0 a 100%
            $user_idea->update();

            toast('Se ha guardado tu progreso', 'success');
	    } else {
	    	toast('No has seleccionado ninguna tarea', 'error');
	    }

		Alert::success('¡Éxito!', 'Ahora conoces cómo convertir una idea en negocio. ¡Muchos éxitos!')
			->persistent(true);
            
		return redirect('/');

    }
}
