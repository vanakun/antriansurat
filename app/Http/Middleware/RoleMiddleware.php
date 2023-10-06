<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // dd($request->user()->role);
        if (auth()->check()) {
            $user = auth()->user();
    
            if ($user->role === 'Admin') {
                return redirect('/admin');
            } elseif ($user->role === 'Tenagaahli') {
                return redirect('/dashboard');
            }
        }
    
        return $next($request);
    }
}
