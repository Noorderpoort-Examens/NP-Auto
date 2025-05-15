<?php

namespace Database\Seeders;

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
        ];

        $permissions = [];

        foreach ($permissionNames as $name) {
            $permission = Permission::create(['name' => $name]);
            $permissions[] = $permission;
        }

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions($permissions);
        $user->assignRole($role);
    }
}
