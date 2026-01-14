<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'province' => 'Jawa Barat',
                'latitude' => -6.914744,
                'longitude' => 107.609810,
            ],
            [
                'province' => 'Jawa Tengah',
                'latitude' => -6.993200,
                'longitude' => 110.420300,
            ],
            [
                'province' => 'DI Yogyakarta',
                'latitude' => -7.795580,
                'longitude' => 110.369490,
            ],
            [
                'province' => 'Jawa Timur',
                'latitude' => -7.250445,
                'longitude' => 112.768845,
            ],
            [
                'province' => 'Sumatera Barat',
                'latitude' => -0.947083,
                'longitude' => 100.417181,
            ],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
