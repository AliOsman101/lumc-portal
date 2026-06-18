<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // If not logged in → redirect to login
        if (!$user) {
            return redirect()->route('login');
        }

        // If user has no role column or role is null
        if (!isset($user->role)) {
            abort(403, 'Role not assigned.');
        }

        // If role does not match allowed roles
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}