<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class CheckUser
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
        $userRoles = Auth::user()->roles->pluck('title');
        if (!($userRoles->contains('moderator')) AND (!$userRoles->contains('admin')))  {
            return redirect()->route('public');
        }
        return $next($request);
    }
}
