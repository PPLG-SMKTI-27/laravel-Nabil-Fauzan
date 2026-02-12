<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
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

        // Jika umur tidak ada atau kurang dari 18
        if (!$user->age || $user->age < 18) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Akses hanya untuk pengguna berusia minimal 18 tahun.');
        }

        return $next($request);
    }
}
