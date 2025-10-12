<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            '2 Large Bedrooms',
            'Spacious Living Room',
            'Bonfire Area',
            'Refrigerator',
            'Garden View',
            'Free Wi-Fi',
            'Flat-screen TV',
            'Air Conditioning',
            'Room Service',
            'Coffee/Tea Station',
            'Towels & Toiletries',
            'Closet & Hangers',
            'Work Desk',
            'Balcony',
            'Daily Housekeeping',
            
            // Additional Uganda-specific amenities
            '24/7 Security',
            'Water Tank / Borehole',
            'Parking Space',
            'Generator Backup',
            'Swimming Pool',
            'Covered Veranda',
            'Laundry Area',
            'Children Play Area',
            'Fenced Compound',
            'Solar Water Heater',
            'Internet Router / Fiber',
            'Gym / Fitness Area',
            'Private Entrance',
            'Fire Extinguishers',
            'Outdoor BBQ Area',
        ];


        foreach ($amenities as $amenity) {
            DB::table('amenities')->insert([
                'name' => $amenity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
