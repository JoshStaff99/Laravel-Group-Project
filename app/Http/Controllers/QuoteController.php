<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $dashboardType = Auth::user()->is_admin ? 'Admin Dashboard' : 'User Dashboard';
        } else {
            $dashboardType = 'Guest Dashboard';
        }
        return view('quotes.index', compact('dashboardType'));
    }

    public function create()
    {
        
    }

    public function show()
    {
        
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
