<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorForAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && (int) $user->level_id === 1 && is_null($user->two_factor_confirmed_at)) {
            return redirect()->route('profil.keamanan')
                ->with('warning', 'Administrator wajib mengaktifkan autentikator.');
        }

        return $next($request);
    }
}
