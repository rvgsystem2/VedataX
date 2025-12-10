<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view users',
            'edit users',
            'delete users',
            'create users',
            'view roles',
            'edit roles',
            'delete roles',
            'create roles',
            'view permission',
            'edit permission',
            'delete permission',
            'create permission',
            'assign permissions user',
            'show property types',
            'create property types',
            'edit property types',
            'delete property types',
            'show cities',
            'create cities',
            'edit cities',
            'delete cities',
            'show properties',
            'create properties',
            'edit properties',
            'view properties',
            'delete properties',
            'show amenities',
            'create amenities',
            'edit amenities',
            'delete amenities',
            'show enquiries',
            'delete enquiries',
            'update enquiry status',
            'show price ranges',
            'add price ranges',
            'remove price ranges',


        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        DB::table('price_ranges')->insert([
            ['type' => 'min', 'label' => '฿1,000,000', 'value' => 1000000],
            ['type' => 'min', 'label' => '฿3,000,000', 'value' => 3000000],
            ['type' => 'max', 'label' => '฿10,000,000', 'value' => 10000000],
            ['type' => 'max', 'label' => '฿20,000,000', 'value' => 20000000],
        ]);
    }

}
