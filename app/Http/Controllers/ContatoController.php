<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ContactReason;

class ContatoController extends Controller
{
    public function contato(){
        $contactReasons = ContactReason::all();
        return view('site.contato', ['title' => 'NexGestao - Contato', 'contactReasons' => $contactReasons]);
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

       $rules = [
        'name' => ['required', 'max:40', 'min:3'],
        'email' => ['required', 'email:rfc', 'max:255', 'min:5'],
        'phone' => ['required', 'max:20','min:5'],
        'contact_reasons_id' => ['required', 'integer', 'required'],
        'message' => ['string', 'max:500'],
       ];

       $feedbacks = [
        'name.required' => 'O nome é obrigatório',
        'name.max' => 'O nome deve ter no máximo 40 caracteres',
        'name.min' => 'O nome deve ter no mínimo 3 caracteres',
        'email.required' => 'O e-mail é obrigatório',
        'email.email' => 'O e-mail deve ser um endereço válido',
        'email.rfc' => 'O e-mail não é válido',
        'email.max' => 'O e-mail deve ter no máximo 255 caracteres',
        'email.min' => 'O e-mail deve ter no mínimo 5 caracteres',
        'phone.required' => 'O telefone é obrigatório',
        'phone.max' => 'O telefone deve ter no máximo 20 caracteres',
        'phone.min' => 'O telefone deve ter no mínimo 5 caracteres',
        'contact_reasons_id.required' => 'A causa do contato é obrigatória',
        'contact_reasons_id.integer' => 'A causa do contato deve ser um número inteiro',
        'message.string' => 'A mensagem deve ser uma string',
        'message.max' => 'A mensagem deve ter no máximo 500 caracteres'
       ];

       $request->validate($rules,$feedbacks);

       SiteContact::create($request->all());
       return redirect()->route('site.index')->with('success', 'Sua solicitação de contato foi enviada com sucesso!');

    }
}
