<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Quote;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //////
    ///  show admin dashboard
    //////
    public function dashboard()
    {
        $quotes = Quote::latest()->take(5)->get();
        $products = Product::latest()->take(5)->get();

        return view('dashboard', compact('quotes', 'products'));
    }

    //////
    ///  show list of products
    //////
    public function products()
    {
        return view('admin.products');
    }

    //////
    ///  show the list of quotes
    //////
    public function quotes()
    {
        return view('admin.quotes');
    }
}
