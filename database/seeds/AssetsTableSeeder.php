<?php

use App\Asset;
use App\Team;
use Illuminate\Database\Seeder;

/**
 * Class AssetsTableSeeder
 */
class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $assets = [
            'RTX 3060 Ti Rog Strix OC',
            'Razer Basilisk Ultimate',
            'Logitech G502X',
            'Asus ROG Strix 5600XT',
            'Asus ROG Strix B550',
            'Ryzen 7 7900X',
            'Intel i5 10950'
        ];

        foreach ($assets as $asset) {
            Asset::factory()->create([
                'name'        => $asset,
                'description' => $asset
            ]);
        }
    }
}
