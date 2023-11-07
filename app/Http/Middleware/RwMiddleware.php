<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RwMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!(Session::get('ketua_rw'))) return redirect('masuk');
        return $next($request);
    }
}
