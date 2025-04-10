<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
    
        if (!Auth::user()) {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Akun tidak ditemukan.']);
        }
    
        if (!in_array(Auth::user()->role, $roles)) {
            return abort(403, 'Unauthorized');
        }
    
        return $next($request);
    }
}
