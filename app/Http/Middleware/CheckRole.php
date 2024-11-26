<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        if (!$user) {
            return redirect('/login');
        }

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses.');
    }
}
