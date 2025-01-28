<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactReason;

class PrincipalController extends Controller
{
    public function principal(){
        $contactReasons = ContactReason::all();
        return view('site.principal', ['title' => 'Super Gestão - Home', 'contactReasons' => $contactReasons]);
    }
}

