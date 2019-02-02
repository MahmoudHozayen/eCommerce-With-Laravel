<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;
use App\User;
class ModeratorOnly
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
        if (Admin::isMod()) {
            return $next($request);            
        }
        return redirect('home');
    }
}
