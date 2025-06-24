<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
     * @param  \Illuminate\Http\Request 
     * @param \Closure
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // this checks if the user is logged in, gets the email of the logged in user and checks if the users email exists in the admins table
        // both conditions must be true, must be logged in and have admin auth.
        if (Auth::check() && Admin::where('email', Auth::user()->email)->exists()) {
          //if (Auth::check() && Auth::user()->role === 'admin')
            return $next($request);
        }
        // this redirects with an error message if theyre not admin
        return redirect('/')->with('error', 'You do not have admin access.');
        //abort(403, 'Unautherised access');

    }
}
