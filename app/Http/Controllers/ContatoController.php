<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContact;

class ContatoController extends Controller
{
    public function contato(){
        return view('site.contato', ['title' => 'Super Gestão - Contato']);
    }

    public function store(Request $request){
        $contact = new SiteContact();
        /*$contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->reason = $request->input('reason');
        $contact->message = $request->input('message');
        */
        $contact->create($request->all());
        $contact->save();

    }
}
