<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\UserTask;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function saveStep1(Request $request, Idea $idea)
    {
    	$tasks = $request->tasks;

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
		return redirect()->route('user.ideas.get.step2', $idea);

    }

    public function getStep2(Idea $idea)
    {
    	return $idea;
        //$ideas = Idea::where('category_id', $request->category_id)->get();
        //$idea_name = Category::whereId($request->category_id)->pluck('name')->first();
        //return view('user.ideas.index', compact('ideas', 'idea_name'));
    }
}
