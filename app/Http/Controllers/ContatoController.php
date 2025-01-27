<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContact;

class ContatoController extends Controller
{
    public function contato(){
        $contact_reasons = [
            '1' => 'Dúvidas',
            '2' => 'Sugestões',
            '3' => 'Reclamações',
            '4' => 'Elogios',
            '5' => 'Outros'
        ];
        return view('site.contato', ['title' => 'Super Gestão - Contato', 'contact_reasons' => $contact_reasons]);
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
        'name' => ['required', 'string', 'max:40', 'min:3'],
        'email' => ['required', 'string', 'email:rfc', 'max:255', 'min:5', 'unique:site_contacts'],
        'phone' => ['required', 'string', 'max:20','min:5'],
        'reason' => ['required', 'integer'],
        'message' => ['string', 'max:500'],
       ]);

    }
}
