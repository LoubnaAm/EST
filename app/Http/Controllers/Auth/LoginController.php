<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{

    //google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Récupérer l'utilisateur authentifié avec Google
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Gérer les erreurs, par exemple si l'utilisateur annule l'authentification
            return redirect()->route('login')->with('error', 'Connexion avec Google échouée.');
        }

        // Enregistrer ou connecter l'utilisateur dans votre application
        $user = $this->_registerOrLoginUser($googleUser);

        // Rediriger l'utilisateur vers le tableau de bord
        return redirect()->route('dashboard');
    }



  //facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->route('dashboard');
    }

      //github

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {

            $user = Socialite::driver('github')->stateless()->user();

            $this->_registerOrLoginUser($user);


            return redirect()->route('dashboard');
        } catch (\Exception $e) {
     
            return redirect()->route('login')->with('error', 'Impossible de se connecter avec GitHub. Veuillez réessayer.');
        }
    }


    protected function _registerOrLoginUser($data){

        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();

        }
        Auth::login($user);

    }

}
