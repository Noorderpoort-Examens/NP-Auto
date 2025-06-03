<?php

namespace Database\Seeders;

use App\Models\DashboardAccess;
use App\Models\Information;
use App\Models\Mechanic;
use App\Models\OpeningTime;
use App\Models\ServiceDuration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $developmentUser = User::factory()->create([
            'name' => 'development',
            'email' => 'development@example.com',
            'password' => 'development'
        ]);

        $mechanicUser = User::factory()->create([
            'name' => 'mechanic',
            'email' => 'mechanic@example.com',
            'password' => 'monteur'
        ]);

        $testUser = User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'test'
        ]);

        $user = User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'user',
        ]);

        $permissionNames = [
            'manage users',
            'manage roles',
            'manage permissions',
            'manage reservations',
            'manage services',
            'manage appointments',
            'manage information',
            'manage occasions',
        ];

        $permissions = [];

        foreach ($permissionNames as $name) {
            $permission = Permission::create(['name' => $name]);
            $permissions[] = $permission;
        }

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($permissions);
        $developmentUser->assignRole($adminRole);

        $mechanicRole = Role::create(['name' => 'monteur']);
        $mechanicUser->assignRole($mechanicRole);

        $testRole = Role::create(['name' => 'test']);
        $testRole->syncPermissions($permissions);
        $testUser->assignRole($testRole);

        DashboardAccess::create([
            'role_id' => $adminRole->id,
            'can_access' => true,
        ]);

        DashboardAccess::create([
            'role_id' => $testRole->id,
            'can_access' => true,
        ]);

        DashboardAccess::create([
            'role_id' => $mechanicRole->id,
            'can_access' => true,
        ]);
    }
}
