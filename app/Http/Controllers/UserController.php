<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //function pour valider les donnees des users
    public function store (Request $request){
        $validatorData = $request -> validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed ', 

        ]);

        $user = User::create([
            'name' => $validatorData['name'],
            'email' => $validatorData['email'],
            'password' => Hash::make($validatorData['password']) ,
        ]);

        return new  UserResource($user);
    }


    public function index(){
        return UserResource::Collection(User::all());
    }

    
}
