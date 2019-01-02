<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()){
            if (!$request->user()->hasRole($role) ){
                return redirect()->route('welcome');
            }
        } else{
            return redirect()->route('login');
        }

        return $next($request);
    }
}
