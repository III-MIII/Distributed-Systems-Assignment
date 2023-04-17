<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(30);

        return response($products); 
        // return view('products.index', compact('products'))->with(request()->input('page'));  --- Nino original
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate user input
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'power_ps' => 'required',
            'price' => 'required',
        ]);

        //create a new product in the database
        Product::create($request->all());

        //redirect the user and send a message
        return redirect()->route('products.index')->with('success', 'Product was successfully created and stored!');

    }

    /**
     * Display the specified resource.
     */
     // public function show(Product $product)  --- Nino original
     public function show(string $id)
    {
        // return view('products.show', compact('product'));  --- Nino original

        $product = Product::find($id);

        return response($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // validate user input
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'power_ps' => 'required',
            'price' => 'required',
        ]);

        //update product in the database
        $product->update($request->all());

        //redirect the user and send a message
        return redirect()->route('products.index')->with('success', 'Product was successfully updated and stored!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // delete the product
        $product->delete();

        // redirect the user and display success message
        return redirect()->route('products.index')->with('success', 'Product was successfully deleted!');
    }
}
