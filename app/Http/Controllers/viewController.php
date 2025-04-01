<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function dashboard(Request $request){
        return view('dashboard');
    }

    public function add_task(Request $request){
        return view('add');
    }

    public function login(Request $request){
        return view('login');
    }
    public function register(Request $request){
        return view('register');
    }

    public function update(Request $request){
        return view('update');
    }
}
