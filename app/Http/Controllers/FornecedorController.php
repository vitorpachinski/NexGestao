<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = session()->get('fornecedores');
        $message = isset($fornecedores) ? null : 'Nenhum fornecedor cadastrado';
        $title = 'Super Gestão - Fornecedores';
        return view('app.fornecedor.index', compact('fornecedores','message', 'title'));
    }
    // public function store(Request $request){
    //     $fornecedores = session()->get('fornecedores', []);
    //     $fornecedores[] = $request->all();
    //     session()->put('fornecedores', $fornecedores);
    //     return redirect()->route('app.fornecedores');
    // }
}
