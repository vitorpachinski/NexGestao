<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        $units = Unit::all();
        return view('app.products.index', ['title' => 'NexGestao - Produtos', 'products' => $products, 'units' => $units]);
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        $units = Unit::all();
        return view('app.products.create',[ 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rules = [
            'name' => 'required|min:3|max:100',
            'description' => 'required|max:255',
            'weight' => 'required|numeric',
            'unit_id' => 'exists:units,id'
        ];
        $feedback = [
            'required' => 'O campo :attribute e obrigatorio !',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres!',
            'max' => 'O campo :attribute deve ter no maximo :max caracteres!',
            'numeric' => 'O campo :attribute deve ser um numero!',
            'unit_id.exists' => 'A unidade de medida escolhida não existe!'
        ];
        $request->validate($rules, $feedback);
        Product::create($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('app.products.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        return view('app.products.edit',['product' => $product, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
