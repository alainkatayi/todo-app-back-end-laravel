<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    //function pour l'enregistrement d'un user
    public function register( Request $request){
        //validation des donnees, mise en place des restrictions
        $validator = Validator::make($request -> all(), [
            'name'=>'required|string|max:50',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:4|confirmed'
        ]);

        //si la creation echoue, on renvoi un message d'erreur 404
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        
        //dans le cas contraire, on creer l'utilisateur avec les informations recuperer du request
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),//on hash le mot de passe
        ]); 
        //creation du token
        $token=$user->createToken('AuthToken')->plainTextToken;

        //apres la creation, on renvoi un json avec les message du user
        return response()->json([
            'message'=> 'Inscription réussie',
            'user' => $user,
            "token"=>$token
        ], 201);
    }
}
