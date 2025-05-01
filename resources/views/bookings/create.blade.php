<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Đặt phòng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Thông tin phòng -->
                        <div class="w-full md:w-1/3">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <h3 class="text-xl font-semibold mb-4">Thông tin phòng</h3>
                                <div class="mb-4">
                                    <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="{{ $room->room_number }}" class="w-full h-48 object-cover rounded-lg">
                                </div>
                                <h4 class="text-lg font-medium mb-2">Phòng {{ $room->room_number }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $room->roomType->name }}</p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ Str::limit($room->description, 100) }}</p>
                                <div class="border-t border-gray-200 dark:border-gray-600 pt-4 mt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600 dark:text-gray-400">Sức chứa:</span>
                                        <span class="font-medium">{{ $room->capacity }} người</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-gray-600 dark:text-gray-400">Giá phòng:</span>
                                        <span class="font-bold text-xl">{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form đặt phòng -->
                        <div class="w-full md:w-2/3">
                            <h3 class="text-xl font-semibold mb-4">Thông tin đặt phòng</h3>

                            <form method="POST" action="{{ route('bookings.store', $room) }}">
                                @csrf

                                <!-- Ngày check-in -->
                                <div class="mb-4">
                                    <x-input-label for="check_in_date" :value="__('Ngày nhận phòng')" />
                                    <x-text-input id="check_in_date" class="block mt-1 w-full" type="date" name="check_in_date" :value="old('check_in_date', date('Y-m-d'))" required />
                                    <x-input-error :messages="$errors->get('check_in_date')" class="mt-2" />
                                </div>

                                <!-- Ngày check-out -->
                                <div class="mb-4">
                                    <x-input-label for="check_out_date" :value="__('Ngày trả phòng')" />
                                    <x-text-input id="check_out_date" class="block mt-1 w-full" type="date" name="check_out_date" :value="old('check_out_date', date('Y-m-d', strtotime('+1 day')))" required />
                                    <x-input-error :messages="$errors->get('check_out_date')" class="mt-2" />
                                </div>

                                <!-- Số lượng khách -->
                                <div class="mb-4">
                                    <x-input-label for="guests_count" :value="__('Số lượng khách')" />
                                    <select id="guests_count" name="guests_count" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        @for ($i = 1; $i <= $room->capacity; $i++)
                                            <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>{{ $i }} người</option>
                                        @endfor
                                    </select>
                                    <x-input-error :messages="$errors->get('guests_count')" class="mt-2" />
                                </div>

                                <!-- Yêu cầu đặc biệt -->
                                <div class="mb-6">
                                    <x-input-label for="special_requests" :value="__('Yêu cầu đặc biệt (nếu có)')" />
                                    <textarea id="special_requests" name="special_requests" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('special_requests') }}</textarea>
                                    <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
                                </div>

                                <!-- Thông tin giá -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                                    <h4 class="font-medium mb-2">Thông tin thanh toán</h4>
                                    <div class="flex justify-between items-center mb-2">
                                        <span>Giá phòng mỗi đêm:</span>
                                        <span>{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                    <div class="flex justify-between items-center mb-2">
                                        <span>Số đêm:</span>
                                        <span id="nights-count">1</span>
                                    </div>
                                    <div class="flex justify-between items-center border-t border-gray-200 dark:border-gray-600 pt-2 mt-2">
                                        <span class="font-medium">Tổng tiền:</span>
                                        <span class="font-bold text-xl" id="total-price">{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <a href="{{ route('rooms.show', $room) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Quay lại</a>
                                    <x-primary-button>
                                        {{ __('Xác nhận đặt phòng') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tính số đêm và tổng tiền
        function calculateTotal() {
            const checkInDate = new Date(document.getElementById('check_in_date').value);
            const checkOutDate = new Date(document.getElementById('check_out_date').value);
            
            // Tính số ngày giữa hai ngày
            const diffTime = Math.abs(checkOutDate - checkInDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Hiển thị số đêm
            document.getElementById('nights-count').textContent = diffDays;
            
            // Tính tổng tiền
            const pricePerNight = {{ $room->price_per_night }};
            const totalPrice = pricePerNight * diffDays;
            
            // Hiển thị tổng tiền đã format
            document.getElementById('total-price').textContent = new Intl.NumberFormat('vi-VN').format(totalPrice) + ' VNĐ';
        }

        // Gọi hàm khi trang load và khi thay đổi ngày
        document.addEventListener('DOMContentLoaded', calculateTotal);
        document.getElementById('check_in_date').addEventListener('change', calculateTotal);
        document.getElementById('check_out_date').addEventListener('change', calculateTotal);
    </script>
</x-app-layout> 