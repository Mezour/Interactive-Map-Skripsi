<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $path = storage_path('app/public/GeoJSON/indonesia-province.geojson');

        if (!File::exists($path)) {
            $this->command->error('GeoJSON file not found!');
            return;
        }

        $geojson = json_decode(File::get($path), true);

        foreach ($geojson['features'] as $feature) {
            $properties = $feature['properties'];
            $geometry = $feature['geometry'];

            // Hitung centroid sederhana
            [$lat, $lng] = $this->calculateCentroid($geometry);

            Region::updateOrCreate(
                ['bps_code' => $properties['bps_code']],
                [
                    'province' => $properties['province'],
                    'latitude' => $lat,
                    'longitude' => $lng,
                ]
            );
        }
    }

    private function calculateCentroid(array $geometry): array
    {
        $latSum = 0;
        $lngSum = 0;
        $count = 0;

        if ($geometry['type'] === 'Polygon') {
            $polygons = [$geometry['coordinates']];
        } elseif ($geometry['type'] === 'MultiPolygon') {
            $polygons = $geometry['coordinates'];
        } else {
            return [0, 0];
        }

        foreach ($polygons as $polygon) {
            foreach ($polygon[0] as $point) {
                $lngSum += $point[0];
                $latSum += $point[1];
                $count++;
            }
        }

        return [
            $latSum / $count,
            $lngSum / $count,
        ];
    }
}
