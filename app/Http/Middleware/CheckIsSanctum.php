<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsSanctum
{
    public function handle($request, Closure $next)
    {

        if ($request->header('authorization')) {
            return $next($request);
        }

        $headerAuth = $request->header('authorization');

        $headerAuthOnlyToken = trim(str_replace('Bearer', '', $headerAuth));

        $tokenParts = explode('|', $headerAuthOnlyToken);

        $error = ['message' => 'Unauthenticated. Invalid token.'];

        if (count($tokenParts) !== 2) {
            return response()->json($error, 401);
        }

        if (strlen($tokenParts[1]) !== 40) {
            return response()->json($error, 401);
        }

        return $next($request);
    }
}
