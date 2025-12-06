<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $types = [
            ['title' => 'Villa/House', 'icon_class' => 'fas fa-building'],
            ['title' => 'Sea View', 'icon_class' => 'fas fa-umbrella-beach'],
            ['title' => 'Beachfront', 'icon_class' => 'fas fa-city'],
            ['title' => 'Land', 'icon_class' => 'fas fa-mountain'],
            ['title' => 'Business', 'icon_class' => 'fas fa-city'],

        ];

        foreach ($types as $type) {
            DB::table('property_types')->updateOrInsert(
                ['slug' => Str::slug($type['title'])],
                [
                    'title'      => $type['title'],
                    'slug'       => Str::slug($type['title']),
                    'icon_class' => $type['icon_class'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }



        $cities = [
            'Ayutthaya',
            'Bangkok',
            'Buriram',
            'Chanthaburi',
            'Chiang Mai',
            'Chiang Rai',
            'Chiang Saen',
            'Chonburi',
            'Hat Yai',
            'Hua Hin',
            'Kanchanaburi',
            'Khon Kaen',
            'Krabi',
            'Lampang',
            'Loei',
            'Mae Hong Son',
            'Mukdahan',
            'Nakhon Pathom',
            'Nakhon Ratchasima',
            'Nakhon Si Thammarat',
            'Nonthaburi',
            'Pathum Thani',
            'Pattaya',
            'Phetchabun',
            'Phetchaburi',
            'Phayao',
            'Phichit',
            'Phitsanulok',
            'Phuket',
            'Rayong',
            'Ratchaburi',
            'Samut Prakan',
            'Sisaket',
            'Sukhothai',
            'Surat Thani',
            'Tak',
            'Trang',
            'Ubon Ratchathani',
            'Udon Thani',
            'Yasothon',
        ];


        $now = now();

        $data = collect($cities)->map(function ($city) use ($now) {
            return [
                'country'    => 'Thailand',
                'name'       => $city,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        })->all();

        DB::table('cities')->insert($data);

    }
}
