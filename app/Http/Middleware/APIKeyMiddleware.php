<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIKeyMiddleware
{
    public function handle($request, Closure $next)
    {

        if (strpos($request->url(), 'docs') !== false)
            return $next($request);

        $apiKey = $request->header('X-Api-Key');

        if ($apiKey !== config('app.api_key')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
