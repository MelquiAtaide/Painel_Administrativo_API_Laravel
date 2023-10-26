<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirecionarLogin(){
        return view('login');
    }
    public function logar(){
        dd("caiu aqui");

        return redirect()->route('redirecionarDashboard');
    }
}
