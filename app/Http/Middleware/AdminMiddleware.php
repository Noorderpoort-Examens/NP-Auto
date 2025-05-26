<?php

namespace App\Http\Middleware;

use App\Models\DashboardAccess;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /*  this middleware is to ensure that for every admin page except the login screen, it will check if you are allowed
    * to be there by checking the role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/login')) {
            return $next($request);
        }

        if (!Auth::check()) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        $user = Auth::user();
        $roles = $user->getRoleNames();

        $allowed = DashboardAccess::whereIn('role_name', $roles)
            ->where('can_access', true)
            ->exists();

        if (!$allowed) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        return $next($request);
    }
}
