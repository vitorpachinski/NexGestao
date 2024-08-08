<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestesController extends Controller
{
    public function testes(){
        return view('site.teste');
    }
}
