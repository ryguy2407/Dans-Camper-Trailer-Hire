<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        if(! auth()->user()->admin) {
            return redirect()->back()->with('failed', 'You can\'t access this area');
        }
        return $next($request);
    }
}
