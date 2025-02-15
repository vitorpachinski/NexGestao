<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactReason;

class PublicHomeController extends Controller
{
    public function index(){
        $contactReasons = ContactReason::all();
        return view('site.principal', ['title' => 'NexGestao - Home', 'contactReasons' => $contactReasons]);
    }
}

