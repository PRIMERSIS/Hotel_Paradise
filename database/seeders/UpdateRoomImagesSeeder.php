<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class UpdateRoomImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mảng URL hình ảnh từ mạng cho các loại phòng khác nhau
        $singleRoomImages = [
            'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80',
            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80',
            'https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80'
        ];

        $doubleRoomImages = [
            'https://images.unsplash.com/photo-1598928636135-d146006ff4be?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80',
            'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80'
        ];

        $familyRoomImages = [
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'https://images.unsplash.com/photo-1549638441-b787d2e11f14?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'https://images.unsplash.com/photo-1591088398332-8a7791972843?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80'
        ];

        $vipRoomImages = [
            'https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
            'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80'
        ];

        // Cập nhật ảnh cho Phòng Đơn (room_type_id = 1)
        $singleRooms = Room::where('room_type_id', 1)->get();
        foreach ($singleRooms as $index => $room) {
            $room->image = $singleRoomImages[$index % count($singleRoomImages)];
            $room->save();
        }

        // Cập nhật ảnh cho Phòng Đôi (room_type_id = 2)
        $doubleRooms = Room::where('room_type_id', 2)->get();
        foreach ($doubleRooms as $index => $room) {
            $room->image = $doubleRoomImages[$index % count($doubleRoomImages)];
            $room->save();
        }

        // Cập nhật ảnh cho Phòng Gia Đình (room_type_id = 3)
        $familyRooms = Room::where('room_type_id', 3)->get();
        foreach ($familyRooms as $index => $room) {
            $room->image = $familyRoomImages[$index % count($familyRoomImages)];
            $room->save();
        }

        // Cập nhật ảnh cho Phòng VIP (room_type_id = 4)
        $vipRooms = Room::where('room_type_id', 4)->get();
        foreach ($vipRooms as $index => $room) {
            $room->image = $vipRoomImages[$index % count($vipRoomImages)];
            $room->save();
        }

        // Cập nhật ảnh cho các loại phòng
        DB::table('room_types')->where('id', 1)->update(['image' => $singleRoomImages[0]]);
        DB::table('room_types')->where('id', 2)->update(['image' => $doubleRoomImages[0]]);
        DB::table('room_types')->where('id', 3)->update(['image' => $familyRoomImages[0]]);
        DB::table('room_types')->where('id', 4)->update(['image' => $vipRoomImages[0]]);
    }
} 