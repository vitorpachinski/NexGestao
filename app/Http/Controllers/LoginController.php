<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['title' => 'Login']);
    }

    public function store(Request $resquest){

    }
}
