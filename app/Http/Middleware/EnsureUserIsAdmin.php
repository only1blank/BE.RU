<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

      
        return redirect('/')->with('error', 'Вы не имеете доступа!');
    }
}
