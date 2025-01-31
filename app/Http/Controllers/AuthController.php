<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        // Validation des données d'authentification
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie
            return redirect()->intended('/'); // Redirige l'utilisateur vers le tableau de bord ou une autre page.
        }

        return back()->withErrors([
            'form' => 'Username ou mot de passe incorrecte.',
        ])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login'); 
    }

    
    // public function logout()
    // {
    //     // Déconnexion de l'utilisateur actuellement authentifié
    //     /// Supprimer l'ID de l'utilisateur de la session
    //     session()->forget('user_id');

    //     // Supprimer toutes les informations de session
    //     session()->flush();


    //     // Redirection vers une autre page après la déconnexion
    //     return redirect('/login');
    // }
}
