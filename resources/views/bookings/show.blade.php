<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chi tiết đặt phòng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-semibold">Đặt phòng #{{ $booking->id }}</h3>
                            <div>
                                @if($booking->status == 'confirmed')
                                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Đã xác nhận</span>
                                @elseif($booking->status == 'cancelled')
                                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">Đã hủy</span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Đang chờ</span>
                                @endif
                            </div>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400">Đặt lúc: {{ $booking->created_at->format('H:i - d/m/Y') }}</p>
                    </div>

                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Thông tin phòng -->
                        <div class="w-full md:w-1/3">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h3 class="text-xl font-semibold mb-4">Thông tin phòng</h3>
                                <div class="mb-4">
                                    @if($booking->room->image)
                                        <img src="{{ asset('storage/rooms/' . $booking->room->image) }}" alt="{{ $booking->room->room_number }}" class="w-full h-48 object-cover rounded-lg">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded-lg">
                                            <span class="text-gray-500">Không có hình ảnh</span>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="text-lg font-medium mb-2">Phòng {{ $booking->room->room_number }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $booking->room->roomType->name }}</p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $booking->room->description }}</p>
                                <div class="border-t border-gray-200 dark:border-gray-600 pt-4 mt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Sức chứa:</span>
                                        <span class="font-medium">{{ $booking->room->capacity }} người</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-gray-600 dark:text-gray-400">Giá phòng:</span>
                                        <span class="font-bold">{{ number_format($booking->room->price_per_night, 0, ',', '.') }} VNĐ / đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thông tin đặt phòng -->
                        <div class="w-full md:w-2/3">
                            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg mb-6">
                                <h3 class="text-xl font-semibold mb-4">Thông tin đặt phòng</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Ngày nhận phòng:</p>
                                        <p class="font-medium mb-3">{{ $booking->check_in_date->format('d/m/Y') }}</p>
                                        
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Ngày trả phòng:</p>
                                        <p class="font-medium mb-3">{{ $booking->check_out_date->format('d/m/Y') }}</p>
                                        
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Số đêm:</p>
                                        <p class="font-medium mb-3">{{ $booking->check_in_date->diffInDays($booking->check_out_date) }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Số lượng khách:</p>
                                        <p class="font-medium mb-3">{{ $booking->guests_count }} người</p>
                                        
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Giá mỗi đêm:</p>
                                        <p class="font-medium mb-3">{{ number_format($booking->room->price_per_night, 0, ',', '.') }} VNĐ</p>
                                        
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Tổng tiền:</p>
                                        <p class="font-medium text-xl text-green-600 dark:text-green-400">{{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</p>
                                    </div>
                                </div>
                                
                                @if($booking->special_requests)
                                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                                        <p class="text-gray-600 dark:text-gray-400 mb-1">Yêu cầu đặc biệt:</p>
                                        <p class="font-medium">{{ $booking->special_requests }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="bg-blue-50 dark:bg-blue-900 p-6 rounded-lg mb-6">
                                <h3 class="text-xl font-semibold mb-3 text-blue-800 dark:text-blue-200">Lưu ý quan trọng</h3>
                                <ul class="list-disc list-inside text-blue-700 dark:text-blue-300 space-y-2">
                                    <li>Vui lòng xuất trình CMND/CCCD hoặc hộ chiếu khi nhận phòng.</li>
                                    <li>Thời gian nhận phòng sau 14:00 và trả phòng trước 12:00.</li>
                                    <li>Nếu bạn cần hỗ trợ hoặc có thay đổi, vui lòng liên hệ với chúng tôi ít nhất 24 giờ trước khi nhận phòng.</li>
                                </ul>
                            </div>

                            <div class="flex justify-between">
                                <a href="{{ route('bookings.my-bookings') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Quay lại danh sách</a>
                                
                                @if($booking->status === 'confirmed')
                                    <form method="POST" action="{{ route('bookings.cancel', $booking) }}">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy đặt phòng này?')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Hủy đặt phòng</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 