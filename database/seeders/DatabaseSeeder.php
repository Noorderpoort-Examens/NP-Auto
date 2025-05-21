<?php

namespace Database\Seeders;

use App\Models\Mechanic;
use App\Models\ServiceDuration;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $user = User::factory()->create([
            'name' => 'development',
            'email' => 'test@test.com',
            'password' => 'development'
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

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);
        $user->assignRole($role);


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
