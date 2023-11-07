<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LurahMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!(Session::get('lurah'))) return redirect('masuk');
        return $next($request);
    }
}
