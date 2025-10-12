<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cartypes = [
            ['name' => 'Toyota', 'slug' => 'toyota'],
            ['name' => 'Mercedes-Benz', 'slug' => 'mercedes-benz'],
            ['name' => 'BMW', 'slug' => 'bmw'],
            ['name' => 'Nissan', 'slug' => 'nissan'],
            ['name' => 'Hyundai', 'slug' => 'hyundai'],
            ['name' => 'Kia', 'slug' => 'kia'],
            ['name' => 'Volkswagen', 'slug' => 'volkswagen'],
            ['name' => 'Mazda', 'slug' => 'mazda'],
            ['name' => 'Honda', 'slug' => 'honda'],
            ['name' => 'Ford', 'slug' => 'ford'],
            ['name' => 'Chevrolet', 'slug' => 'chevrolet'],
            ['name' => 'Isuzu', 'slug' => 'isuzu'],
            ['name' => 'Mitsubishi', 'slug' => 'mitsubishi'],
            ['name' => 'Peugeot', 'slug' => 'peugeot'],
            ['name' => 'Renault', 'slug' => 'renault'],
            ['name' => 'Suzuki', 'slug' => 'suzuki'],
            ['name' => 'Datsun', 'slug' => 'datsun'],
            ['name' => 'Subaru', 'slug' => 'subaru'],
            ['name' => 'Land Rover', 'slug' => 'land-rover'],
            ['name' => 'Tata', 'slug' => 'tata'],
            ['name' => 'Fiat', 'slug' => 'fiat'],
            ['name' => 'Jeep', 'slug' => 'jeep'],
            ['name' => 'Volvo', 'slug' => 'volvo'],
            ['name' => 'Mahindra', 'slug' => 'mahindra'],
            ['name' => 'Lexus', 'slug' => 'lexus'],
            ['name' => 'Porsche', 'slug' => 'porsche'],
            ['name' => 'Jaguar', 'slug' => 'jaguar'],
            ['name' => 'Chery', 'slug' => 'chery'],
            ['name' => 'Haval', 'slug' => 'haval'],
            ['name' => 'Geely', 'slug' => 'geely'],
            ['name' => 'Great Wall', 'slug' => 'great-wall'],
            ['name' => 'Changan', 'slug' => 'changan'],
            ['name' => 'BYD', 'slug' => 'byd'],
            ['name' => 'Proton', 'slug' => 'proton'],
            ['name' => 'SsangYong', 'slug' => 'ssangyong']
        ];

        foreach ($cartypes as $type) {
            DB::table('cartypes')->insert($type);
        }
    
    }
}
