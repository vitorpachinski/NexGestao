<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Mostra o formulário de cadastro.
     */
    public function create()
    {
        return view('app.customers.create');
    }

    /**
     * Salva um cliente no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number_1' => 'nullable|string|max:15',
            'whatsapp_number_2' => 'nullable|string|max:15',
            'phone_number_1' => 'nullable|string|max:15',
            'phone_number_2' => 'nullable|string|max:15',
        ]);

        // Criar cliente
        Customer::create($validated);

        return redirect()->route('app.customers.create')->with('success', 'Cliente cadastrado com sucesso!');
    }
}
