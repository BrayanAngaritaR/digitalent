<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IdeasController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.ideas.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Idea::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'url'           => $request->url, //Se asigna la URL que está en la posición del arreglo
            'category_id'   => $request->category_id,
            'english_idea'  => $request->english_idea,
            'extract'       => $request->extract
        ]);

        toast('Se ha creado la idea', 'success');
        return back();
    }
}
