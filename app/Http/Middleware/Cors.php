<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    const HEADERS = [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Max-Age' => '86400',
        'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
    ];

    public function handle($request, Closure $next)
    {
        // si /api no esta en la primera posicion no añado cabeceras.
        if (strpos($request->getRequestUri(), '/api') !== 0) {
            return $next($request);
        }

        if ($request->isMethod('OPTIONS')) {
            return response()->json('{"method":"OPTIONS"}', 200, self::HEADERS);
        }

        $response = $next($request);
        foreach (self::HEADERS as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
