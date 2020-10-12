<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIP
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ip() !== '10.10.22.11') {
            abort(403, "you can't access the website from this ip");
        } else {
            return $next($request);

        }
    }
}
