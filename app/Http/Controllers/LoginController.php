<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //function pour la connexion d'un user
    public function login(Request $request){

        //validation des donnees 
        $validatioData = $request -> validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //verifie si les identifiants sont correct
        if (Auth::attempt($validatioData)){
            //si les donnees sont correctes, on recupere l'utilisateur  authentifié
            $user = Auth::user();
            //on genere un token
            $token = $user->createToken('TodoApp')->plainTextToken;
            //on return dans un json les informations du user et les token
            return response() ->json([
                "message" => 'Connexion reussie',
                "user" => $user,
                'token' => $token,
            ]);
        }
        //si les donnees n'est sont pas correctes, on renvoi un message d'erreur
        return response() ->json([
            "message" => "Password or email incorrect"
        ], 401);

    }
}

