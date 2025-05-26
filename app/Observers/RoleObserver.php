<?php

namespace App\Observers;

use App\Models\DashboardAccess;
use App\Models\Role;

class RoleObserver
{
    public function created(Role $role): void
    {
        DashboardAccess::firstOrCreate([
            'role_id' => $role->id,
        ], [
            'can_access' => false,
        ]);
    }
}
