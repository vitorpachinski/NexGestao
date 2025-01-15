<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = DB::select('select * from fornecedores');
        if (empty($fornecedores)) {
            $existe = 'Não existem fornecedores';
        }
        $existe = null;
        
        return view('app.fornecedor.index', compact('fornecedores','existe'));
    }
    public function store(Request $request){
        if ($request->has('nome')) {
            $nome = $request->input('nome');
            $phone = $request->input('phone');
            DB::update('insert into fornecedores set name =?, phone =?', [$nome, $phone]);
            $fornecedores =  DB::select('select * from fornecedores');
            session()->put('fornecedores', $fornecedores);
            return redirect()->route('app.fornecedores');
        }
    }
}
