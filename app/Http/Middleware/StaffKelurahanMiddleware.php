<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class StaffKelurahanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!(Session::get('staff'))) return redirect('masuk');
        return $next($request);
    }
}
