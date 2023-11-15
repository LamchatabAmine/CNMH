<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class IsLeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user has the role of "leader"
            if (Auth::user()->role == 'leader') {
                // User is a leader, allow the request to proceed
                return $next($request);
            }
        }

        // User is not a leader, you can customize the response or redirect
        // return response('Non autorisé. Vous ne disposez pas des autorisations nécessaires.', 403);
        return abort(403);
    }
}
