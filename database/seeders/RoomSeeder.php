<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Phòng Đơn - Room Type 1
        for ($i = 101; $i <= 105; $i++) {
            DB::table('rooms')->insert([
                'room_type_id' => 1,
                'room_number' => 'A' . $i,
                'price_per_night' => 500000,
                'capacity' => 1,
                'image' => 'single_room_' . rand(1, 3) . '.jpg',
                'is_available' => true,
                'description' => 'Phòng đơn tiện nghi với đầy đủ tiện ích cơ bản.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Phòng Đôi - Room Type 2
        for ($i = 201; $i <= 205; $i++) {
            DB::table('rooms')->insert([
                'room_type_id' => 2,
                'room_number' => 'B' . $i,
                'price_per_night' => 800000,
                'capacity' => 2,
                'image' => 'double_room_' . rand(1, 3) . '.jpg',
                'is_available' => true,
                'description' => 'Phòng đôi thoáng mát với ban công và view đẹp.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Phòng Gia Đình - Room Type 3
        for ($i = 301; $i <= 303; $i++) {
            DB::table('rooms')->insert([
                'room_type_id' => 3,
                'room_number' => 'C' . $i,
                'price_per_night' => 1200000,
                'capacity' => 4,
                'image' => 'family_room_' . rand(1, 3) . '.jpg',
                'is_available' => true,
                'description' => 'Phòng gia đình rộng rãi với phòng khách và bếp nhỏ.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Phòng VIP - Room Type 4
        for ($i = 401; $i <= 402; $i++) {
            DB::table('rooms')->insert([
                'room_type_id' => 4,
                'room_number' => 'D' . $i,
                'price_per_night' => 2000000,
                'capacity' => 2,
                'image' => 'vip_room_' . rand(1, 3) . '.jpg',
                'is_available' => true,
                'description' => 'Phòng VIP sang trọng với dịch vụ đặc biệt và view biển.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
