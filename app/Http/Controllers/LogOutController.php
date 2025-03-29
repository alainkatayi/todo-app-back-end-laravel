<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogOutController extends Controller
{
    //function pour la deconnexion du user
    public function log_out(Request $request){
        //on recupere le user connecté
        $user = Auth::user();

        //on verifie si le user est authentifié
        if($user){
            //s'il est authentifié, on supprime le token
            $user ->tokens()->delete();
            // est on retrn un message de deconnexion
            return response()->json([
                "message"=>"Deconnexion reussie"
            ]);
        }
        //si le user n'est pas authentifié, on renvoi une erreur 401
        return response()->json([
            "message"=>"Uitlisateur non Authentifié"
        ],401);
    }
}
