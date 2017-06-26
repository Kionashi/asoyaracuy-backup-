<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAdmin
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
        // dump($request);die;
        if (Auth::user() == null || Auth::user()->role == 'USER') {
            return redirect('/');
        }

        return $next($request);
    }

}