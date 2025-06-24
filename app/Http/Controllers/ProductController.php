<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quote;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('quote')->paginate(10); //10 products per page // eager load quote
        return view('products.index', compact('products')); //create product associative array
    }

    public function create()
    {
        $quotes = Quote::all(); // can choose a quote to assign the product to
        return view('products.create', compact('quotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'quote_id' => 'required|exists:quotes,id',
            'price' => 'required|decimal',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load('quote'); 
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $quotes = Quote::all(); 
        return view('products.edit', compact('product', 'quotes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'quote_id' => 'required|exists:quotes,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}