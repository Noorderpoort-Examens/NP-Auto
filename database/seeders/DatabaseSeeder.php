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

        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'manage users']);

        $role->givePermissionTo($permission);
        $user->assignRole($role);
    }
}
