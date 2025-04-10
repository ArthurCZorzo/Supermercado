<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function tryLogin(Request $req){
        $credenciais = [
            'email' => $req->email,
            'password' => $req->senha
        ];

        if (Auth::attempt($credenciais)){
            return redirect(route('produtos.show'));
        }

        session()->flash('mensagem', 'Credenciais inválidas');
        return redirect(route('login'));
    }

    function register(){
        return view('auth.register');
    }

    function saveRegister(Request $req){
        $user = new User();
        $user->name = $req->nome;
        $user->email = $req->email;
        $user->password = $req->senha;
        $user->save();

        session()->flash('mensagem', 'Usuário registrado com sucesso.');

        return redirect(route('login'));
    }

    function logout(){
        Auth::logout();

        return redirect(route('login'));
    }
}
