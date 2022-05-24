<?php

namespace App\Http\Middleware;

class SetGuard
{
    public function handle($request, \Closure $next, $default = null)
    {
        if (in_array($default, array_keys(config("auth.guards")))) {
            config(["auth.defaults.guard" => $default]);
        }
        return $next($request);
    }
}