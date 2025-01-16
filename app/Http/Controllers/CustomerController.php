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
    public function create()
    {
        return view('app.customers.create');
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
            ['contact_type' => 'whatsapp', 'number' => $validated['whatsapp_1']],
            ['contact_type' => 'whatsapp', 'number' => $validated['whatsapp_2']],
            ['contact_type' => 'phone', 'number' => $validated['phone_1']],
            ['contact_type' => 'phone', 'number' => $validated['phone_2']],
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
