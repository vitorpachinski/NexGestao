<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Contact;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Exibe o formulário de cadastro de cliente.
     */
    public function index()
    {
        return view('app.clientes',['title' => 'Area administrativa - Clientes']);
    }

    /**
     * Salva um cliente e seus contatos no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->all();

        // Criar cliente
        $customer = Customer::create([
            'name' => $validated['name'],
        ]);
        

        // Criar contatos associados ao cliente
        $contacts = [
            ['code' => 'whatsapp', 'number' => $validated['whatsapp_1']],
            ['code' => 'whatsapp', 'number' => $validated['whatsapp_2']],
            ['code' => 'phone', 'number' => $validated['phone_1']],
            ['code' => 'phone', 'number' => $validated['phone_2']],
        ];

        // Filtra contatos válidos (ignora campos vazios)
        foreach ($contacts as $contact) {
            if (!empty($contact['number'])) {
                $customer->contacts()->create($contact);
            }
        }

        return redirect()->route('app.customers.create')->with('success', 'Cliente e contatos cadastrados com sucesso!');
    }
}
