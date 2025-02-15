<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unity;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        $unitys = Unity::all();
        return view('app.products.index', ['title' => 'NexGestao - Produtos', 'products' => $products, 'unitys' => $unitys]);
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        return view('app.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $rules = [
            'name' => 'required|min:3|max:100',
            'description' => 'required|max:255',
            'wieght' => 'required|numeric',
            'unity_id' => 'required|numeric'
        ];
        $feedback = [
            'required' => 'O campo :attribute e obrigatorio !',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres!',
            'max' => 'O campo :attribute deve ter no maximo :max caracteres!',
            'numeric' => 'O campo :attribute deve ser um numero!'
        ];
        $request->validate($rules, $feedback);
        $product::create($request->all());
        return redirect()->route('app.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
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
