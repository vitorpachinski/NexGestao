<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        // $fornecedores = session()->get('fornecedores');
        // $message = isset($fornecedores) ? null : 'Nenhum fornecedor cadastrado';
        // $title = 'Area administrativa - Fornecedores';
        return view('app.suppliers.index', ['title' => 'Area Administrativa | Fornecedores']);
    }
    // public function store(Request $request){
    //     $fornecedores = session()->get('fornecedores', []);
    //     $fornecedores[] = $request->all();
    //     session()->put('fornecedores', $fornecedores);
    //     return redirect()->route('app.fornecedores');
    // }
    public function list(Request $request)
    {   
        $suppliers = Supplier::where('name', 'like', '%'.$request->input('name').'%')
        ->where('country', 'like', '%'.$request->input('country').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(3);

        return view('app.suppliers.list', ['title' => 'Lista de fornecedores', 'suppliers' => $suppliers, 'request' => $request->all()]);
    }
    public function new()
    {
        return view('app.suppliers.add', ['title' => 'Cadastrar fornecedor']);
    }
    public function add(Request $request)
    {
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $rules = [
                'name' => 'required | max:50 | min:3',
                'site' => 'max:255',
                'country' => 'required | max:2 | min:2',
                'email' => 'required | email |'
            ];
            $feedbacks = [
                'required' => 'O campo :attribute é obrigatório',
                'name.max' => 'O nome deve ter no máximo 50 caracteres',
                'name.min' => 'O nome deve ter no mínimo 3 caracteres',
                'site.max' => 'O site deve ter no máximo 255 caracteres',
                'email.email' => 'O e-mail deve ser um endereço válido',
                'email.unique' => 'Este e-mail já está cadastrado',
                'country.max' => 'O país deve ter 2 caracteres',
                'country.min' => 'O país deve ter 2 caracteres'
            ];
            $request->validate($rules, $feedbacks);
            $fornecedor = new Supplier;
            $fornecedor->create($request->all());
            $message = "Cadastro realizado com sucesso";
        }

        //to update
        if ($request->input('_token') != '' && $request->input('id') != ''){
            $supplier = Supplier::find($request->input('id'));
            $update = $supplier->update($request->all());
            if(!$update){
                $message = "Ocorreu um erro ao atualizar";
                return redirect()->route('app.fornecedores.edit', ['message' => $message]);
            }
            $message = "Atualização realizada com sucesso";
            return redirect()->route('app.fornecedores.edit', ['id' => $request->input('id'), 'message' => $message]);

        }
        return view('app.suppliers.add', ['title'=>'Cadastrar fornecedor','message' => $message]);
    }
    public function edit($id, $message = ''){
        $supplier = Supplier::find($id);
        if(!$supplier){
            return redirect()->route('app.fornecedores');
        }
        return view('app.suppliers.add', ['supplier' => $supplier, 'message' => $message]);
    }

    public function remove($id){
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier->delete();
            return redirect()->route('app.fornecedores');
        }
        return redirect()->route('app.fornecedores');
    }
}
