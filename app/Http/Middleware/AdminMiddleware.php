<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!(Session::get('admin') || Session::get('lurah')
            || Session::get('kasi') || Session::get('staff') || Session::get('ketua_rt') || Session::get('ketua_rw'))) return redirect('masuk');
        return $next($request);
    }
}
