<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Middleware\AccessLogMiddleware;

class AboutController extends Controller
{
    /*public function __construct(){
        $this->middleware(AccessLogMiddleware::class);
    }*/
    public function about(){
        return view('site.sobre-nos', ['title' => 'NexGestao - Sobre Nós']);
    }
}
