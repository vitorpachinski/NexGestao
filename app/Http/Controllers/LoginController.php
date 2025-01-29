<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $errorLog = '';
            if($request->get('errorLog') == 1){
                $errorLog = 'Email ou senha inválidos';
            }
            if($request->get('errorLog') == 2){
                $errorLog = 'Você precisa estar autenticado para acessar essa pagina';
            }
        return view('site.login', ['title' => 'Login', 'errorLog' => $errorLog]);
    }

    public function store(Request $request){
        $rules = [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8']
        ];
        $feedbacks = [
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'O e-mail é inválido',
            'email.max' => 'O e-mail deve ter no máximo 255 caracteres',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres'
        ];

        $request->validate($rules,$feedbacks);

        $email = $request->get('email');
        $password = $request->get('password');


        $user = User::where('email', $email)->where('password', $password)->first();

        if(!isset($user->email)){
            return redirect()->route('site.login',['errorLog' => 1]);
        }
        
        session_start();
        $_SESSION['userId'] = $user->id;
        $_SESSION['email'] = $user->email;
        return redirect()->route('app.clientes');
    }

    public function logout(){
        session_start();
        session_destroy();
        return redirect()->route('site.login');
    }
}
