<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOrganiser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->check()){

            if(Auth::user()->roles->isNotEmpty()){
                if(Auth::user()->roles->contains('id',3)){
                    return $next($request);
                }
            }
        }

        abort(403,'You are not authorized to access this route');   
       
    }
}
