<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsTeacher
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

        // Jika bukan teacher
        if ($user->role !== 'teacher') {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Akses hanya untuk guru.');
        }

        return $next($request);
    }
}
