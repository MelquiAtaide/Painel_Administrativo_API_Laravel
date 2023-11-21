<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Models\Usuarios;

class LoginController extends Controller
{
    public function redirecionarLogin(){
        return view('login');
    }
    public function logar(LoginRequest $request){
        $login = Usuarios::where('email', $request->email)->first();
        if ($login && Hash::check($request->senha, $login->senha)) {
            Auth::login($login);
            // Auth::loginUsingId($login->id);
            session(['admin' => $login->nome]);
            return redirect()->route('listar.usuarios');
        }
        return redirect()->back()->withErrors('As credenciais fornecidas são inválidas.');
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('redirecionar.login');
    }
}
