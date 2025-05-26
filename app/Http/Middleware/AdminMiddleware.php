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
        // Don't abort if the request (url) is going to login or logout
        if ($request->is('admin/login' || $request->is('admin/logout'))) {
            return $next($request);
        }

        if (!Auth::check()) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        $user = Auth::user();
        $roles = $user->roles;

        // Get all role IDs of the logged in user
        $roleIds = $roles->pluck('id')->toArray();

        // Checks if a record with role_id en can_access true exists in $roleIds
        $allowed = DashboardAccess::whereIn('role_id', $roleIds)
            ->where('can_access', true)
            ->exists();

        if (!$allowed) {
            abort(403, 'Je hebt geen toegang tot deze pagina.');
        }

        return $next($request);
    }
}
