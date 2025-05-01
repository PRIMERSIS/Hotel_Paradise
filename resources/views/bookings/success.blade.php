<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Đặt phòng thành công') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center mb-8">
                        <svg class="mx-auto h-20 w-20 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h1 class="mt-4 text-3xl font-bold text-gray-900 dark:text-gray-100">Đặt phòng thành công!</h1>
                        <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Cảm ơn bạn đã lựa chọn khách sạn của chúng tôi.</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg mb-8">
                        <h3 class="text-xl font-semibold mb-4">Thông tin đặt phòng</h3>
                        
                        @if (session()->has('booking'))
                            @php
                                $booking = session('booking');
                                $room = $booking->room;
                            @endphp
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-gray-600 dark:text-gray-400 mb-1">Mã đặt phòng:</p>
                                    <p class="font-medium mb-3">{{ $booking->id }}</p>
                                    
                                    <p class="text-gray-600 dark:text-gray-400 mb-1">Phòng:</p>
                                    <p class="font-medium mb-3">{{ $room->room_number }} - {{ $room->roomType->name }}</p>
                                    
                                    <p class="text-gray-600 dark:text-gray-400 mb-1">Số lượng khách:</p>
                                    <p class="font-medium mb-3">{{ $booking->guests_count }} người</p>
                                </div>
                                
                                <div>
                                    <p class="text-gray-600 dark:text-gray-400 mb-1">Ngày nhận phòng:</p>
                                    <p class="font-medium mb-3">{{ $booking->check_in_date->format('d/m/Y') }}</p>
                                    
                                    <p class="text-gray-600 dark:text-gray-400 mb-1">Ngày trả phòng:</p>
                                    <p class="font-medium mb-3">{{ $booking->check_out_date->format('d/m/Y') }}</p>
                                    
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
                        @else
                            <p>Đặt phòng của bạn đã được xác nhận. Thông tin chi tiết đã được gửi đến email của bạn.</p>
                        @endif
                    </div>

                    <div class="bg-blue-50 dark:bg-blue-900 p-6 rounded-lg mb-8">
                        <h3 class="text-xl font-semibold mb-3 text-blue-800 dark:text-blue-200">Lưu ý quan trọng</h3>
                        <ul class="list-disc list-inside text-blue-700 dark:text-blue-300 space-y-2">
                            <li>Vui lòng xuất trình CMND/CCCD hoặc hộ chiếu khi nhận phòng.</li>
                            <li>Thời gian nhận phòng sau 14:00 và trả phòng trước 12:00.</li>
                            <li>Nếu bạn cần hỗ trợ hoặc có thay đổi, vui lòng liên hệ với chúng tôi ít nhất 24 giờ trước khi nhận phòng.</li>
                        </ul>
                    </div>

                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('rooms.index') }}" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Xem phòng khác</a>
                        <a href="{{ route('bookings.my-bookings') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Xem đặt phòng của tôi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 