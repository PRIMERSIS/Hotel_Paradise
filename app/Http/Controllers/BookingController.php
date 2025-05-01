<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display booking form.
     */
    public function create(Room $room)
    {
        return view('bookings.create', compact('room'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request, Room $room)
    {
        $validated = $request->validate([
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests_count' => 'required|integer|min:1|max:'.$room->capacity,
            'special_requests' => 'nullable|string',
        ]);

        // Tính số ngày
        $checkIn = new \DateTime($validated['check_in_date']);
        $checkOut = new \DateTime($validated['check_out_date']);
        $days = $checkIn->diff($checkOut)->days;
        
        // Tính tổng tiền
        $totalPrice = $room->price_per_night * $days;
        
        // Tạo booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'guests_count' => $validated['guests_count'],
            'special_requests' => $validated['special_requests'] ?? null,
            'total_price' => $totalPrice,
            'status' => 'confirmed'
        ]);
        
        // Cập nhật trạng thái phòng
        $room->is_available = false;
        $room->save();
        
        return redirect()->route('bookings.success')->with('booking', $booking);
    }
    
    /**
     * Display booking success page.
     */
    public function success()
    {
        return view('bookings.success');
    }

    /**
     * Display user's bookings.
     */
    public function myBookings()
    {
        $bookings = Auth::user()->bookings()->with('room.roomType')->orderBy('created_at', 'desc')->get();
        return view('bookings.my-bookings', compact('bookings'));
    }

    /**
     * Display booking details.
     */
    public function show(Booking $booking)
    {
        // Check if booking belongs to the current user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('bookings.show', compact('booking'));
    }

    /**
     * Cancel a booking.
     */
    public function cancel(Booking $booking)
    {
        // Check if booking belongs to the current user
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $booking->status = 'cancelled';
        $booking->save();

        // Set room as available again
        $room = $booking->room;
        $room->is_available = true;
        $room->save();

        return redirect()->route('bookings.my-bookings')->with('success', 'Đặt phòng đã được hủy thành công.');
    }
}
