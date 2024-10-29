<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login'); // যদি ইউজার লগইন না করে থাকে, তাহলে লগইন পেজে পাঠানো হবে
        }

        if (Auth::user()->usertype !== 'admin') {

            // return redirect()->route('logout');
            // echo 'Your Are User';
            // Auth::user()->logout();
            // return redirect('/')->with('error', 'You are not authorized to access this page.');
            return back();
        }


        // if (! $request->user() || !$request->user()->usertype) {
        //     return redirect()->route('login');
        // }

        return $next($request);
    }
}
