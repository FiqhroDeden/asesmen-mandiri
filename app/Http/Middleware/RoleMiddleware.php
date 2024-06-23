<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();
        if ($user->role !== 'super_admin') {
            if (!in_array($user->role, $roles)) {
                if($user->role == 'peserta'){
                    return redirect()->route('biodata');
                }else{
                    abort(403);
                    // abort(403);
                }
            }
        }
        return $next($request);
    }
}
