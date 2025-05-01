<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms | Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .room-container:not(:last-child) {
            margin-bottom: 8rem;
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
        .room-image {
            position: relative;
            overflow: hidden;
            height: 400px;
        }
        .room-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .room-image:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900">Rooms</h1>
        </div>
    </header>
    
    <main>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Intro Section -->
            <div class="mb-20 text-center">
                <h2 class="text-3xl font-semibold mb-8">Corktown Hotel Detroit Rooms</h2>
                <p class="max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
                    Cozy up at The Godfrey Hotel Detroit, and recharge in Detroit's Corktown neighborhood, the city's oldest yet hippest quarter. 
                    Handsomely appointed, every room at The Godfrey Hotel Detroit has been meticulously appointed to present tailored, yet informal, comfort. 
                    Enjoy the convenience and luxury of ultra-fast Wi-Fi, Frette linens, 65" Samsung HDTV, Bose Bluetooth speakers, C.O. Bigelow bath products, and more. 
                    This is where to stay to Discover Your Element in Detroit.
                </p>
            </div>
            
            <!-- Rooms List -->
            <div class="space-y-32">
                @foreach($rooms as $room)
                <div class="room-container">
                    <div class="flex flex-col md:flex-row gap-8 md:gap-16">
                        <div class="w-full md:w-3/5">
                            <div class="room-image bg-gray-200">
                                @if($room->image)
                                    <img src="{{ $room->image }}" alt="{{ $room->roomType->name }}">
                                @else
                                    <img src="https://via.placeholder.com/800x600?text=No+Image+Available" alt="{{ $room->roomType->name }}">
                                @endif
                            </div>
                        </div>
                        
                        <div class="w-full md:w-2/5 flex flex-col justify-center">
                            <h3 class="text-2xl font-semibold mb-3">{{ $room->roomType->name }}</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed">
                                @if(strpos($room->roomType->name, 'King') !== false)
                                    Indulge in this inviting room featuring a luxurious king-sized bed appointed with high-quality linens and plush pillows.
                                @elseif(strpos($room->roomType->name, 'Queen') !== false)
                                    Relax and recharge in this welcoming room offering queen-sized beds with high-quality linens and plush pillows.
                                @else
                                    {{ Str::limit($room->description, 150) }}
                                @endif
                            </p>
                            
                            <div class="flex space-x-4">
                                <a href="{{ route('rooms.show', $room) }}" class="btn">View Room</a>
                                <a href="{{ route('bookings.create', $room) }}" class="btn">Book now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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