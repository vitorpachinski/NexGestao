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
        /*$contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->reason = $request->input('reason');
        $contact->message = $request->input('message');
        */
        //SiteContact::create($request->all());
       // SiteContact::save();

       $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:site_contacts'],
        'phone' => ['required', 'string', 'max:20'],
        'reason' => ['required', 'integer'],
        'message' => ['required', 'string', 'max:500'],
       ]);

    }
}
