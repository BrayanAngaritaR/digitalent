<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home page
Route::get('/', function () {
	$categories = App\Models\Category::all();
    return view('user.index', compact('categories'));
})->name('homepage');

//Save $idea session
Route::post('/save-session', function (Request $request) {
	\Session::put('idea.url', $request->slug);
    return redirect()->route('user.login.facebook', 'facebook');
})->name('url.session.store');

/*
=========================================
Facebook login and register routes
=========================================
*/

//Login and register routes
Auth::routes();

//Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

//Facebook provider
Route::get('/auth/redirect/{provider}', 'User\SocialController@redirect')->name('user.login.facebook');
Route::get('/callback/{provider}', 'User\SocialController@callback');

/*
========================
Ideas
========================
*/

//Return all available Ideas
Route::post('/ideas', 'User\IdeasController@index')->name('user.ideas.index');

Route::get('/ideas', function () {
	$idea_name = "Búsqueda vacía";
	$ideas = [];
    return view('user.ideas.index', compact('ideas', 'idea_name'));
});

//Display idea information in Step 1
Route::get('/ideas/{idea}', 'User\IdeasController@show')->name('user.ideas.show');

//Save Step 1
Route::post('/ideas/{idea}/save-step-1', 'User\StepController@saveStep1')->name('user.ideas.save.step1');

//Display idea information in Step 2
Route::get('/ideas/{idea}/2', 'User\StepController@getStep2')->name('user.ideas.get.step2');

//Save Step 2
Route::post('/ideas/{idea}/save-step-2', 'User\StepController@saveStep2')->name('user.ideas.save.step2');

//Display idea information in Step 3
Route::get('/ideas/{idea}/3', 'User\StepController@getStep3')->name('user.ideas.get.step3');

//Save Step 3
Route::post('/ideas/{idea}/save-step-3', 'User\StepController@saveStep3')->name('user.ideas.save.step3');

/*
========================
User Ideas
========================
*/

//Show all saved user ideas
Route::get('/mis-ideas/', 'User\UserIdeasController@index')->name('saved.user.ideas.index')->middleware('auth');
Route::get('/mis-tareas/', 'User\UserTasksController@index')->name('completed.user.tasks')->middleware('auth');

/*
========================
Admin
========================
*/

//Save ideas
Route::get('/admin/ideas/create', 'Admin\IdeasController@create')->name('admin.ideas.create');
Route::post('/admin/ideas/create', 'Admin\IdeasController@store')->name('admin.ideas.store');

//Save tasks in idea
Route::get('/admin/tasks/create', 'Admin\TasksController@create')->name('admin.tasks.create');
Route::post('/admin/tasks/create', 'Admin\TasksController@store')->name('admin.tasks.store');

//Save resources in idea
Route::get('/admin/resources/create', 'Admin\ResourcesController@create')->name('admin.resources.create');
Route::post('/admin/resources/create', 'Admin\ResourcesController@store')->name('admin.resources.store');


