<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Task;
use App\Models\UserIdea;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ideas = Idea::where('category_id', $request->category_id)->paginate(10);
        $idea_name = Category::whereId($request->category_id)->pluck('name')->first();
        return view('user.ideas.index', compact('ideas', 'idea_name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {

        //Guardar la idea en el perfil del usuario

        $user = Auth::id();

        UserIdea::updateOrCreate([
            'user_id'   => $user,
            'idea_id'   => $idea->id
        ]);

        $resources = Resource::where('idea_id', $idea->id)
                ->where('step_id', 1)->get();

        $tasks = Task::where('idea_id', $idea->id)
                ->where('step_id', 1)->get();

        $user_tasks = UserTask::where('idea_id', $idea->id)
            ->where('user_id', $user)
            ->where('step_id', 1)->pluck('task_id');
            
        return view('user.ideas.show', 
            compact([
                'idea', 
                'resources', 
                'tasks',
                'user_tasks'
            ])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return "Eliminar la idea de mi perfil"
    }
}
