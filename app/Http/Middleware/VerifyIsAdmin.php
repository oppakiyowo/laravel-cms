<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isAdmin()){
            session()->flash('error', 'Anda tidak berhak mengakses halaman tersebut, karena bukan
            Administrator');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
