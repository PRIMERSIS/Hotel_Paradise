<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            [
                'name' => 'Phòng Đơn',
                'description' => 'Phòng tiêu chuẩn với 1 giường đơn, phù hợp cho 1 người.',
                'image' => 'single_room.jpg',
                'base_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phòng Đôi',
                'description' => 'Phòng tiêu chuẩn với 1 giường đôi, phù hợp cho 2 người.',
                'image' => 'double_room.jpg',
                'base_price' => 800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phòng Gia Đình',
                'description' => 'Phòng lớn với 2 giường đôi, phù hợp cho gia đình 4 người.',
                'image' => 'family_room.jpg',
                'base_price' => 1200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phòng VIP',
                'description' => 'Phòng cao cấp với đầy đủ tiện nghi sang trọng, view đẹp.',
                'image' => 'vip_room.jpg',
                'base_price' => 2000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
