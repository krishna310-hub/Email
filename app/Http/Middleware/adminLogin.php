<?php

namespace App\Http\Middleware;

use App\Models\email;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd('hi');
        // dd(Auth::user());
        // dd(Auth::check());
        if (Auth::check())
        {
            // dd(Auth::user());

            $credentials = Auth::user();
            return $next($request);
        }
            else{
                // dd('User not authenticated');
                return redirect()->route('login')->with('error', 'Access denied.');
            }
    }
}
