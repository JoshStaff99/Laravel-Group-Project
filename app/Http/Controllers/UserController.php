<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // User Dashboard
    public function dashboard()
    {
        $userId = Auth::id();

        $assignedQuotes = Quote::where('user_id', $userId)
                                ->latest()
                                ->take(5)
                                ->get();

        $pendingQuotes = Quote::where('user_id', $userId)
                              ->where('status', 'sent') // waiting for acceptance
                              ->latest()
                              ->take(5)
                              ->get();

        $dashboardType = 'User Dashboard';

        return view('dashboard', compact('assignedQuotes', 'pendingQuotes', 'dashboardType'));
    }

    // All quotes belonging to the logged-in customer
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

        return redirect()->route('dashboard')->with('success', 'Quote accepted successfully.');
    }
}