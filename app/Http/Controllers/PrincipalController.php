<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactReason;

class PrincipalController extends Controller
{
    public function principal(){
        $contact_reasons = ContactReason::all();
        return view('site.principal', ['title' => 'Super Gestão - Home', 'contact_reasons' => $contact_reasons]);
    }
}

