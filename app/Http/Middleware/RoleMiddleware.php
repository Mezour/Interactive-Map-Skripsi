<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth('api')->user();

        // belum login / token invalid
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        // role tidak sesuai
        if (!in_array($user->role, $roles)) {
            return response()->json([
                'message' => 'Forbidden: role not allowed'
            ], 403);
        }

        return $next($request);
    }
}
