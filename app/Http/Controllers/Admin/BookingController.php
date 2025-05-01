<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Hiển thị danh sách đặt phòng
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'room.roomType'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Hiển thị thông tin chi tiết đặt phòng
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Hiển thị form chỉnh sửa đặt phòng
     */
    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        $statuses = ['pending', 'confirmed', 'cancelled', 'completed'];
        return view('admin.bookings.edit', compact('booking', 'rooms', 'statuses'));
    }

    /**
     * Cập nhật thông tin đặt phòng
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests_count' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'special_requests' => 'nullable|string',
        ]);

        // Nếu thay đổi phòng hoặc trạng thái, cập nhật trạng thái phòng
        $oldRoomId = $booking->room_id;
        $oldStatus = $booking->status;
        $newRoomId = $validated['room_id'];
        $newStatus = $validated['status'];

        $booking->update($validated);

        // Cập nhật trạng thái phòng cũ nếu có thay đổi
        if ($oldRoomId != $newRoomId || ($oldStatus != $newStatus && ($newStatus == 'cancelled' || $newStatus == 'completed'))) {
            $oldRoom = Room::find($oldRoomId);
            if ($oldRoom) {
                $oldRoom->is_available = true;
                $oldRoom->save();
            }
        }

        // Cập nhật trạng thái phòng mới
        if ($newStatus == 'confirmed' || $newStatus == 'pending') {
            $newRoom = Room::find($newRoomId);
            if ($newRoom) {
                $newRoom->is_available = false;
                $newRoom->save();
            }
        } else {
            $newRoom = Room::find($newRoomId);
            if ($newRoom) {
                $newRoom->is_available = true;
                $newRoom->save();
            }
        }

        return redirect()->route('admin.bookings.index')->with('success', 'Đặt phòng đã được cập nhật thành công.');
    }

    /**
     * Xóa đặt phòng
     */
    public function destroy(Booking $booking)
    {
        // Cập nhật trạng thái phòng thành available
        $room = $booking->room;
        $room->is_available = true;
        $room->save();

        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Đặt phòng đã được xóa thành công.');
    }
} 