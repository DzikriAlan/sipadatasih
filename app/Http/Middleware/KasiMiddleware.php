<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class KasiMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!(Session::get('kasi'))) return redirect('masuk');
        return $next($request);
    }
}
