<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $room->roomType->name }} | Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: 1px solid #333;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #333;
            color: #fff;
        }
        .btn-secondary {
            background-color: #f3f4f6;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
            color: #333;
        }
        .room-image {
            height: 500px;
            overflow: hidden;
        }
        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .amenity-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        .amenity-icon {
            margin-right: 0.75rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900">{{ $room->roomType->name }}</h1>
        </div>
    </header>
    
    <main>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-8">
                    <div class="flex flex-col lg:flex-row gap-12">
                        <!-- Room Image -->
                        <div class="w-full lg:w-3/5">
                            <div class="room-image bg-gray-200 rounded-lg">
                                @if($room->image)
                                    <img src="{{ $room->image }}" alt="{{ $room->roomType->name }}">
                                @else
                                    <img src="https://via.placeholder.com/800x600?text=No+Image+Available" alt="{{ $room->roomType->name }}">
                                @endif
                            </div>
                        </div>

                        <!-- Room Details -->
                        <div class="w-full lg:w-2/5">
                            <h2 class="text-2xl font-semibold mb-6">Room Details</h2>
                            
                            <div class="mb-8">
                                <p class="text-gray-700 text-lg leading-relaxed">
                                    @if(strpos($room->roomType->name, 'King') !== false)
                                        Indulge in this inviting room featuring a luxurious king-sized bed appointed with high-quality linens and plush pillows.
                                    @elseif(strpos($room->roomType->name, 'Queen') !== false)
                                        Relax and recharge in this welcoming room offering queen-sized beds with high-quality linens and plush pillows.
                                    @else
                                        {{ $room->description }}
                                    @endif
                                </p>
                            </div>

                            <div class="mb-8">
                                <h3 class="text-xl font-semibold mb-4">Amenities</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-4 text-gray-700">
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Ultra-fast Wi-Fi
                                    </div>
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Frette Linens
                                    </div>
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        65" Samsung HDTV
                                    </div>
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Bose Bluetooth Speakers
                                    </div>
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        C.O. Bigelow Bath Products
                                    </div>
                                    <div class="amenity-item">
                                        <svg class="amenity-icon w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ $room->capacity }} Person Capacity
                                    </div>
                                </div>
                            </div>

                            <div class="mb-10">
                                <h3 class="text-xl font-semibold mb-3">Price</h3>
                                <p class="text-2xl font-bold text-gray-800">{{ number_format($room->price_per_night, 0, ',', '.') }} VNĐ<span class="text-base font-normal"> / night</span></p>
                            </div>

                            <div class="space-y-4">
                                @if($room->is_available)
                                    @auth
                                        <a href="{{ route('bookings.create', $room) }}" class="w-full inline-block text-center btn">Book now</a>
                                    @else
                                        <div class="space-y-4">
                                            <p class="text-gray-700">Please login to book this room.</p>
                                            <div class="flex space-x-4">
                                                <a href="{{ route('login') }}" class="flex-1 inline-block text-center btn">Login</a>
                                                <a href="{{ route('register') }}" class="flex-1 inline-block text-center btn">Register</a>
                                            </div>
                                        </div>
                                    @endauth
                                @else
                                    <div class="px-6 py-4 bg-red-50 text-red-800 border border-red-200">
                                        <p class="font-medium">This room is currently unavailable.</p>
                                        <p>Please select another room or contact us for more information.</p>
                                    </div>
                                @endif

                                <a href="{{ route('rooms.index') }}" class="w-full inline-block text-center btn btn-secondary">View All Rooms</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <footer class="bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto px-4 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} Hotel Booking. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 