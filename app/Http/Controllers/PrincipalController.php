<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        $contact_reasons = [
            '1' => 'Dúvidas',
            '2' => 'Sugestões',
            '3' => 'Reclamações',
            '4' => 'Elogios',
            '5' => 'Outros'
        ];
        return view('site.principal', ['title' => 'Super Gestão - Home', 'contact_reasons' => $contact_reasons]);
    }
}

