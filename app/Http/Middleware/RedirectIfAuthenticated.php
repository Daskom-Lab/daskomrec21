<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            switch ($guard) {
                case 'datacaas':
                    if (Auth::guard($guard)->check()) 
                        return redirect()->route('home');
                    break;
                case 'admin':
                    if (Auth::guard($guard)->check()) 
                        return redirect()->route('adminHome');
                    break;
                case 'logistik':
                    if (Auth::guard($guard)->check()) 
                        return redirect('/logistikplot');
                    break;    
              }
        }

        return $next($request);
    }
}
