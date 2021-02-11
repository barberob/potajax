<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Les tableaux des providers autorisés
    protected $providers = [ "google", "facebook" ];

    public function socialLogin()
    {
        return view("socialite.social-login");
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(Request $request)
    {
        // On récupère le provider

        $provider = $request->provider;

        // Si le provider est autorisé

        if(in_array($provider, $this->providers))
        {
            // On redirige l'utilisateur desus

            return Socialite::driver($provider)->redirect();
        }

        // Sinon, 404

        else abort(404);
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        // On récupère le provider

        $provider = $request->provider;

        if (in_array($provider, $this->providers))
        {
        	// Les informations provenant du provider

            $userData = Socialite::driver($request->provider)->user();

            // On récupère les informations de l'utilisateur

            $user = $userData->user;
            $userToken = $userData->token;
            $userId = $userData->getId();
            $userName = $userData->getNickname();
            $userNickname = $userData->getName();
            $userEmail = $userData->getEmail();
            $userAvatar = $userData->getAvatar();

            dd($user);
        }

        else abort(404);
    }
}
