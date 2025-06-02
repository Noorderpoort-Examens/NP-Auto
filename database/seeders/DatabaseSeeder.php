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

        Information::create([
            'type' => 'general_info',
            'content' => "<p>NP auto is een klein autobedrijf dat is voortgekomen uit een hobbymatige liefde voor auto's. Door goedkope kosten kunnen wij voor een minimale marge auto's weer doorzetten naar de klant.</p><p><br></p><ul><li>Door onze kosten zo laag mogelijk te houden blijven de autoprijzen ook laag</li><li>Onze monteurs hebben meer dan 15 jaar ervaring</li><li>Voor alle merken kunt u bij ons terecht voor service en onderhoud</li><li>We zijn RDW erkend</li></ul>"
        ]);
        Information::create([
            'type' => 'phonenumber',
            'content' => '0681673336'
        ]);
        Information::create([
            'type' => 'email',
            'content' => 'info@np-auto.nl'
        ]);
        Information::create([
            'type' => 'adress',
            'content' => 'Muntinglaan 3'
        ]);
        Information::create([
            'type' => 'zipcode',
            'content' => '9727 JT Groningen'
        ]);

        $openingTimes = [
            ['day' => 'maandag', 'start' => '09:00', 'end' => '18:00'],
            ['day' => 'dinsdag', 'start' => '09:00', 'end' => '18:00'],
            ['day' => 'woensdag', 'start' => '09:00', 'end' => '18:00'],
            ['day' => 'donderdag', 'start' => '09:00', 'end' => '18:00'],
            ['day' => 'vrijdag', 'start' => '09:00', 'end' => '18:00'],
            ['day' => 'zaterdag', 'start' => '10:00', 'end' => '17:00'],
        ];

        foreach ($openingTimes as $time) {
            OpeningTime::create($time);
        }
    }
}
