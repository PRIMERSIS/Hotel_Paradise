<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Hiển thị danh sách loại phòng
     */
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('admin.room_types.index', compact('roomTypes'));
    }

    /**
     * Hiển thị form tạo loại phòng mới
     */
    public function create()
    {
        return view('admin.room_types.create');
    }

    /**
     * Lưu loại phòng mới vào database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'base_price' => 'required|numeric|min:0',
        ]);

        RoomType::create($validated);

        return redirect()->route('admin.room_types.index')->with('success', 'Loại phòng đã được tạo thành công.');
    }

    /**
     * Hiển thị thông tin chi tiết loại phòng
     */
    public function show(RoomType $roomType)
    {
        return view('admin.room_types.show', compact('roomType'));
    }

    /**
     * Hiển thị form chỉnh sửa loại phòng
     */
    public function edit(RoomType $roomType)
    {
        return view('admin.room_types.edit', compact('roomType'));
    }

    /**
     * Cập nhật thông tin loại phòng
     */
    public function update(Request $request, RoomType $roomType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'base_price' => 'required|numeric|min:0',
        ]);

        $roomType->update($validated);

        return redirect()->route('admin.room_types.index')->with('success', 'Loại phòng đã được cập nhật thành công.');
    }

    /**
     * Xóa loại phòng
     */
    public function destroy(RoomType $roomType)
    {
        // Kiểm tra xem có phòng nào thuộc loại phòng này không
        if ($roomType->rooms()->count() > 0) {
            return redirect()->route('admin.room_types.index')->with('error', 'Không thể xóa loại phòng này vì có phòng đang sử dụng.');
        }

        $roomType->delete();
        return redirect()->route('admin.room_types.index')->with('success', 'Loại phòng đã được xóa thành công.');
    }
} 