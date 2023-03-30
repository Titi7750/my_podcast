<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyAdmins
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->status !== 'admin') {
            abort(403, 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }

        return $next($request);
    }
}
