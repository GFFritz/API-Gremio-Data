<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;

class ForceJson
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
        // Force Json accept type: "Accept: application/json"
        if (! Str::contains($request->header('accept'), ['/json', '+json'])) {
            $request->headers->set('accept', 'application/json,' . $request->header('accept'));
        }

        return $next($request);
    }
}
