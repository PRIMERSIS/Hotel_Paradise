<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Hiển thị dashboard admin
     */
    public function index()
    {
        $stats = [
            'users_count' => User::count(),
            'rooms_count' => Room::count(),
            'room_types_count' => RoomType::count(),
            'bookings_count' => Booking::count(),
            'available_rooms_count' => Room::where('is_available', true)->count(),
            'booked_rooms_count' => Room::where('is_available', false)->count(),
        ];

        $latestBookings = Booking::with(['user', 'room'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestBookings'));
    }
} 