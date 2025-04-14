<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    function login() {
        return view('auth.login');
    }

    function tryLogin(Request $request) {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)){
            return redirect(route('produtos.show'));
        }

        session()->flash('mensagem', 'Credenciais inválidas');
        return redirect(route('auth.login'));
    }

    function register() {
        return view('auth.register');
    }

    function saveRegister(Request $request) {
        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = $request->senha;

        $user->save();

        session()->flash('mensagem', 'Usuário registrado com sucesso.');

        return redirect(route('login'));
    }

    function logout() {
        Auth::logout();
        
        return redirect(route('login'));
    }
}