<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;
use TJGazel\Toastr\Facades\Toastr;

class SocialController extends Controller
{
	public function redirect($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	public function callback($provider)
	{
		try {
            $getInfo = Socialite::driver($provider)->stateless()->user();
            $user = $this->createUser($getInfo,$provider); 
			auth()->login($user); 
        } catch (\Exception $e) {
        	//dd($e->getMessage());
        	Alert::error('¡Atención!', 'Ha ocurrido un error al iniciar sesión. Probablemente cancelaste el inicio de sesión mediante Facebook. Por favor inténtalo de nuevo.')->persistent(true);
            return redirect('/');
        }

		$idea_url = Session::get('idea.url');

		if ($idea_url) {
            toast('Sesión iniciada con éxito','success');
            Session::forget('idea.url');
            return redirect()->route('user.ideas.show', $idea_url);

        } else {
        	toast('Se ha iniciado sesión','success');
        	return redirect()->to('/');
        }

		
		return redirect()->to('/');
	}

	function createUser($getInfo,$provider)
	{
		$user = User::where('provider_id', $getInfo->id)->first();
		if (!$user) 
		{

			$user = User::create([
				'name'     => $getInfo->name,
				'email'    => $getInfo->email,
				'provider' => $provider,
				'provider_id' => $getInfo->id
			]);
		}

		return $user;
	}
}
