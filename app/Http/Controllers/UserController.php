<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show all quotes belonging to the logged-in customer
    public function index()
    {
        $quotes = Quote::where('user_id', Auth::id())->latest()->get();
        return view('user.quotes.index', compact('quotes'));
    }

    // Show a specific quote
    public function show($id)
    {
        $quote = Quote::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('user.quotes.show', compact('quote'));
    }

    // Accept a quote
    public function accept($id)
    {
        $quote = Quote::where('id', $id)
                      ->where('user_id', Auth::id())
                      ->where('status', 'sent')
                      ->firstOrFail();

        $quote->update(['status' => 'accepted']);

        return view('user.quotes.accepted', compact('quote'));
    }
}