<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['title' => 'Login']);
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

        dd($request->all());
    }
}
