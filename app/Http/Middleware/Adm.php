<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Adm
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
        if(auth()->user()->permissao_id == 1 || auth()->user()->permissao_id == 2)
        {
            return $next($request);
        }
        else{
            
            return redirect('dashboard');
        }
    }
}