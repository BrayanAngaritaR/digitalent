<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ideas = Idea::where('category_id', $request->category_id)->get();
        $idea_name = Category::whereId($request->category_id)->pluck('name')->first();
        return view('user.ideas.index', compact('ideas', 'idea_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Idea $idea)
    {

        $resources = Resource::where('idea_id', $idea->id)
                ->where('step_id', 1)->get();

        $tasks = Task::where('idea_id', $idea->id)
                ->where('step_id', 1)->get();

        $user_tasks = UserTask::where('idea_id', $idea->id)
            ->where('user_id', auth()->id())
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
