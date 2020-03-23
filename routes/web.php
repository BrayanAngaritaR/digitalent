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
});

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
	$idea_name = "Debes seleccionar un interés";
	$ideas = [];
    return view('user.ideas.index', compact('ideas', 'idea_name'));
});

//Display idea information in Step 1
Route::get('/ideas/{slug}', 'User\IdeasController@show')->name('user.ideas.show');

//Continue to Step 2
Route::post('/ideas/{idea}/save-step-1', 'User\StepController@saveStep1')->name('user.ideas.save.step1');

//Display idea information in Step 2
Route::get('/ideas/{idea}/2', 'User\StepController@getStep2')->name('user.ideas.get.step2');






