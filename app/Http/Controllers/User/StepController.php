<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StepController extends Controller
{
    public function saveStep1(Request $request, Idea $idea)
    {
    	$tasks = $request->tasks;

		if($tasks)
        {
            foreach($tasks as $task) {
                $data = array(
                    'idea_id' => $idea->id,
                    'task_id' => $task,
                    'step_id' => 1,
                    'user_id' => auth()->user()->id
                );
                UserTask::updateOrCreate($data);    
            }
            toast('Se ha guardado tu progreso', 'success');
        } else {
            toast('No has seleccionado ninguna tarea', 'error');
        }
		return redirect()->route('user.ideas.get.step2', $idea);

    }

    public function getStep2(Idea $idea)
    {

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

    public function saveStep2(Request $request, Idea $idea)
    {
    	$tasks = $request->tasks;

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
			toast('Se ha guardado tu progreso', 'success');
	    } else {
	    	toast('No has seleccionado ninguna tarea', 'error');
	    }
		
		return redirect()->route('user.ideas.get.step3', $idea);

    }

    public function getStep3(Idea $idea)
    {

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
    }

    public function saveStep3(Request $request, Idea $idea)
    {
    	$tasks = $request->tasks;

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
			toast('Se ha guardado tu progreso', 'success');
	    } else {
	    	toast('No has seleccionado ninguna tarea', 'error');
	    }

		Alert::success('¡Éxito!', 'Ahora conoces cómo convertir una idea en negocio. ¡Muchos éxitos!')
			->persistent(true);

		//toast('Se ha guardado tu progreso', 'success');
		return redirect('/');

    }
}
