<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Hiển thị danh sách phòng
     */
    public function index()
    {
        $rooms = Room::with('roomType')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Hiển thị form tạo phòng mới
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        return view('admin.rooms.create', compact('roomTypes'));
    }

    /**
     * Lưu phòng mới vào database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:10|unique:rooms',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|url',
            'description' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        Room::create($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Phòng đã được tạo thành công.');
    }

    /**
     * Hiển thị thông tin chi tiết phòng
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Hiển thị form chỉnh sửa phòng
     */
    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('admin.rooms.edit', compact('room', 'roomTypes'));
    }

    /**
     * Cập nhật thông tin phòng
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|string|max:10|unique:rooms,room_number,' . $room->id,
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|url',
            'description' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        // Set is_available to false if it's not in the request
        if (!isset($validated['is_available'])) {
            $validated['is_available'] = false;
        }

        $room->update($validated);

        return redirect()->route('admin.rooms.index')->with('success', 'Phòng đã được cập nhật thành công.');
    }

    /**
     * Xóa phòng
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Phòng đã được xóa thành công.');
    }
} 