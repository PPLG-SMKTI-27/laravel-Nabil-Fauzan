<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Jika belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Jika bukan admin
        if ($user->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Akses hanya untuk admin.');
        }

        return $next($request);
    }
}
