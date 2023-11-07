<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RtMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!(Session::get('ketua_rt'))) return redirect('masuk');
        return $next($request);
    }
}
