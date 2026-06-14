<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            abort(403);
        }

        $roleName = auth()->user()->role?->name;

        if (!in_array($roleName, ['seller', 'admin'])) {
            abort(403);
        }

        return $next($request);
    }
}