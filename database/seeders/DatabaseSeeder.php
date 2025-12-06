<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CitySeeder::class);




        $superAdmin = Role::where('name', 'Super Admin')->first();
        $superAdmin->syncPermissions(Permission::all());

        // ADMIN permissions
        $adminPermissions = [
            'view users', 'edit users', 'create users',

            'show property types', 'create property types', 'edit property types',

            'show cities', 'create cities', 'edit cities',

            'show properties', 'create properties', 'edit properties', 'view properties',

            'show amenities', 'create amenities', 'edit amenities',

            'show enquiries', 'update enquiry status',
        ];
        Role::where('name', 'Admin')->first()->syncPermissions($adminPermissions);

        // AGENT permissions
        $agentPermissions = [
            'show properties',
            'create properties',
            'edit properties',
            'view properties',

            'show enquiries',
            'update enquiry status',
        ];
        Role::where('name', 'Agent')->first()->syncPermissions($agentPermissions);

        // USER permissions
        $userPermissions = [
            'view properties',
        ];
        Role::where('name', 'User')->first()->syncPermissions($userPermissions);

        // ------------------------------------------
        // 4) Create Super Admin User
        // ------------------------------------------
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
        ])->assignRole('Super Admin');

        $user->assignRole('Super Admin');
    }


}
