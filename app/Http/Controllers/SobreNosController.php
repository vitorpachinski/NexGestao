<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Middleware\AccessLogMiddleware;

class SobreNosController extends Controller
{
    /*public function __construct(){
        $this->middleware(AccessLogMiddleware::class);
    }*/
    public function sobrenos(){
        return view('site.sobre-nos', ['title' => 'Super Gestão - Sobre Nós']);
    }
}
