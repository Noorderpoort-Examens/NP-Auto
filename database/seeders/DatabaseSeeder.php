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
            'email' => 'test@test.com',
            'password' => 'development'
        ]);

        $mechanicUser = User::factory()->create([
            'name' => 'mechanic',
            'email' => 'mechanic@test.com',
            'password' => 'monteur'
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

        DashboardAccess::create([
            'role_id' => $adminRole->id,
            'can_access' => true,
        ]);

        // the 2 timesets we were given and use, but can be expanded manually in the website itself
        $serviceDurations = [
            [
                'name' => 'Halve dag',
                'hours' => 12
            ],
            [
                'name' => 'Hele dag',
                'hours' => 24
            ],
        ];

        foreach ($serviceDurations as $serviceDuration) {
            ServiceDuration::create($serviceDuration);
        }

        // a list of placeholder mechanics
        $mechanics = [
            ['name' => 'Henkie'],
            ['name' => 'Hansje'],
            ['name' => 'Derkus'],
            ['name' => 'Dirkus'],
            ['name' => 'Dorkus'],
        ];

        foreach ($mechanics as $mechanic) {
            Mechanic::create($mechanic);
        }
    }
}
