<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use App\Models\Resource;
use App\Models\Step;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function create()
    {
        $ideas = Idea::latest()->take(20)->get();
        $steps = Step::all();
        return view('admin.resources.create', compact('ideas', 'steps'));
    }

    public function store(Request $request)
    {
        $resources = $request->title;
        $urls = $request->url;

        $i = 0;

        // //Verificar si el tamaño de los recursos es igual al tamaño de los enlaces
        // $resources_size = sizeof($resources);
        // $urls_size = sizeof($urls);

        // if ($resources_size == $urls_size) {
        //     return "Son " . $resources_size . " recursos y " . $urls_size . " enlaces";
        // } else {
        //     return "Ha ocurrido un error porque falta información";
        // }
        // //return sizeof($urls);

        foreach($resources as $resource) 
        {
            Resource::create([
                'title'     => $resource,
                'url'       => $urls[$i], //Se asigna la URL que está en la posición del arreglo
                'idea_id'   => $request->idea_id,
                'step_id'   => $request->step_id
            ]);

            $i++; //Se incrementa $i en +1

              
        }

        toast('Se han asignado los recursos a la idea', 'success');
        return back();
    }
}
