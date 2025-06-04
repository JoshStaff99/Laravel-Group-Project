<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //////
    ///  show admin dashboard
    //////
    public function dashboard()
    {
        return view('admin.dashboard');
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
