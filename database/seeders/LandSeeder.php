<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Land;

class LandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lands = [
            [
                "land_no" => "10_0000001576",
                "longitude" => "107.4361466",
                "latitude" => "-7.0956636",
                "farmer_no" => "F00000815"
            ],
            [
                "land_no" => "10_0000001580",
                "longitude" => "107.4298798",
                "latitude" => "-7.0935361",
                "farmer_no" => "F00000960"
            ],
            [
                "land_no" => "10_0000001581",
                "longitude" => "107.4292774",
                "latitude" => "-7.0922358",
                "farmer_no" => "F00000877"
            ],
            [
                "land_no" => "10_0000001312",
                "longitude" => "107.4338851",
                "latitude" => "-7.0935148",
                "farmer_no" => "F00001094"
            ],
            [
                "land_no" => "10_0000001577",
                "longitude" => "107.432633",
                "latitude" => "-7.096995",
                "farmer_no" => "F00000957"
            ],
            [
                "land_no" => "10_0000001579",
                "longitude" => "107.429438",
                "latitude" => "-7.0944275",
                "farmer_no" => "F00001006"
            ],
            [
                "land_no" => "10_0000001582",
                "longitude" => "107.4292487",
                "latitude" => "-7.0920756",
                "farmer_no" => "F00000958"
            ],
            [
                "land_no" => "10_0000001583",
                "longitude" => "107.4296957",
                "latitude" => "-7.0924941",
                "farmer_no" => "F00000954"
            ],
            [
                "land_no" => "10_0000001584",
                "longitude" => "107.4303603",
                "latitude" => "-7.0928069",
                "farmer_no" => "F00000819"
            ],
            [
                "land_no" => "10_0000001585",
                "longitude" => "107.4341283",
                "latitude" => "-7.0970435",
                "farmer_no" => "F00000969"
            ]
        ];

        foreach ($lands as $land) {
            Land::create($land);
        }
    }
}
