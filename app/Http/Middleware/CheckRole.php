<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        // if ($request->user() && $request->user()->role()->first()->role_name === 'admin')
        if ($request->user() && $request->user()->isAdmin($role))
        {
            return $next($request);
        }
        return redirect()->route('index',app()->getLocale());
    }
}
