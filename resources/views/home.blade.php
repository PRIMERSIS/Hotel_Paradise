<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Paradise - Trải Nghiệm Đẳng Cấp</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
        }
        .transition-transform {
            transition: transform 0.3s ease;
        }
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-2">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Hotel Paradise</h1>
                </div>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium">Trang chủ</a>
                    <a href="#about" class="text-gray-600 hover:text-gray-900 font-medium">Giới thiệu</a>
                    <a href="#rooms" class="text-gray-600 hover:text-gray-900 font-medium">Phòng & Suites</a>
                    <a href="#dining" class="text-gray-600 hover:text-gray-900 font-medium">Ẩm thực</a>
                    <a href="#amenities" class="text-gray-600 hover:text-gray-900 font-medium">Tiện nghi</a>
                    <a href="{{ route('rooms.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">Đặt phòng</a>
                    <a href="{{ route('profile.edit') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Tài khoản</a>
                </nav>
                
                <div class="md:hidden">
                    <button class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Trải nghiệm đẳng cấp xa hoa</h1>
            <p class="text-xl md:text-2xl mb-8">Nơi nghỉ dưỡng hoàn hảo cho kỳ nghỉ của bạn</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="{{ route('rooms.index') }}" class="bg-white text-gray-900 hover:bg-gray-100 py-3 px-8 rounded-full text-lg font-medium transition-all">Đặt phòng ngay</a>
                <a href="#about" class="border-2 border-white text-white hover:bg-white hover:text-gray-900 py-3 px-8 rounded-full text-lg font-medium transition-all">Tìm hiểu thêm</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                    <h2 class="text-4xl font-bold mb-6">Khám phá thế giới thiên đường</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Tọa lạc tại trung tâm thành phố, Hotel Paradise là biểu tượng của sự sang trọng và đẳng cấp. Với kiến trúc độc đáo và dịch vụ 5 sao, chúng tôi cam kết mang đến cho quý khách trải nghiệm lưu trú khó quên.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Mỗi chi tiết trong khách sạn đều được chăm chút tỉ mỉ, từ thiết kế nội thất cho đến ẩm thực đỉnh cao. Hãy để Hotel Paradise trở thành điểm đến lý tưởng cho kỳ nghỉ của bạn.
                    </p>
                    <a href="#" class="text-gray-800 font-medium border-b-2 border-gray-800 hover:text-gray-600 hover:border-gray-600 inline-flex items-center">
                        Tìm hiểu thêm
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Luxury Hotel Lobby" class="rounded-lg shadow-xl w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Phòng & Suite</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Chọn không gian hoàn hảo cho kỳ nghỉ của bạn với các lựa chọn phòng sang trọng của chúng tôi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Room 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Deluxe Room" class="w-full h-64 object-cover transition-transform hover:scale-105">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Phòng Deluxe</h3>
                        <p class="text-gray-600 mb-4">Không gian thoáng đãng với view thành phố tuyệt đẹp, thiết kế hiện đại và đầy đủ tiện nghi.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold">1.500.000 VNĐ / đêm</span>
                            <a href="{{ route('rooms.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Đặt ngay</a>
                        </div>
                    </div>
                </div>
                
                <!-- Room 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Executive Suite" class="w-full h-64 object-cover transition-transform hover:scale-105">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Executive Suite</h3>
                        <p class="text-gray-600 mb-4">Phòng sang trọng với phòng khách riêng biệt, thiết kế tinh tế và dịch vụ VIP.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold">2.800.000 VNĐ / đêm</span>
                            <a href="{{ route('rooms.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Đặt ngay</a>
                        </div>
                    </div>
                </div>
                
                <!-- Room 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Presidential Suite" class="w-full h-64 object-cover transition-transform hover:scale-105">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">Presidential Suite</h3>
                        <p class="text-gray-600 mb-4">Đỉnh cao của sự xa hoa với không gian rộng lớn, view panorama và dịch vụ quản gia riêng.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold">5.500.000 VNĐ / đêm</span>
                            <a href="{{ route('rooms.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Đặt ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('rooms.index') }}" class="inline-block bg-gray-800 text-white py-3 px-8 rounded-full text-lg font-medium hover:bg-gray-700 transition-all">Xem tất cả phòng</a>
            </div>
        </div>
    </section>

    <!-- Dining Section -->
    <section id="dining" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Ẩm thực đỉnh cao</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Trải nghiệm ẩm thực đa dạng với các nhà hàng độc đáo trong khách sạn</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Restaurant 1 -->
                <div class="flex flex-col md:flex-row bg-white rounded-lg overflow-hidden shadow-lg">
                    <div class="md:w-2/5">
                        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Le Gourmet Restaurant" class="w-full h-full object-cover">
                    </div>
                    <div class="md:w-3/5 p-6">
                        <h3 class="text-2xl font-bold mb-2">Le Gourmet</h3>
                        <p class="text-gray-600 mb-4">Nhà hàng fine dining với món ăn Pháp đương đại, được chế biến bởi đầu bếp từng đạt sao Michelin.</p>
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-500 mr-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-gray-600">(120 đánh giá)</span>
                        </div>
                        <a href="#" class="text-gray-800 font-medium border-b-2 border-gray-800 hover:text-gray-600 hover:border-gray-600 inline-flex items-center">
                            Xem thực đơn
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Restaurant 2 -->
                <div class="flex flex-col md:flex-row bg-white rounded-lg overflow-hidden shadow-lg">
                    <div class="md:w-2/5">
                        <img src="https://images.unsplash.com/photo-1525268323446-0505b6fe7778?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Sky Lounge" class="w-full h-full object-cover">
                    </div>
                    <div class="md:w-3/5 p-6">
                        <h3 class="text-2xl font-bold mb-2">Sky Lounge</h3>
                        <p class="text-gray-600 mb-4">Quầy bar trên tầng thượng với view panorama, cocktail sáng tạo và không gian sống động.</p>
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-500 mr-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <span class="text-gray-600">(95 đánh giá)</span>
                        </div>
                        <a href="#" class="text-gray-800 font-medium border-b-2 border-gray-800 hover:text-gray-600 hover:border-gray-600 inline-flex items-center">
                            Xem thực đơn
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Section -->
    <section id="amenities" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Tiện nghi & Dịch vụ</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Tận hưởng các tiện nghi đẳng cấp trong suốt thời gian lưu trú</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <!-- Amenity 1 -->
                <div class="p-6">
                    <div class="bg-gray-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-swimming-pool text-3xl text-gray-800"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Hồ bơi vô cực</h3>
                    <p class="text-gray-600">Hồ bơi ngoài trời với view thành phố tuyệt đẹp</p>
                </div>
                
                <!-- Amenity 2 -->
                <div class="p-6">
                    <div class="bg-gray-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-spa text-3xl text-gray-800"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Spa & Wellness</h3>
                    <p class="text-gray-600">Không gian thư giãn với các liệu pháp độc quyền</p>
                </div>
                
                <!-- Amenity 3 -->
                <div class="p-6">
                    <div class="bg-gray-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-dumbbell text-3xl text-gray-800"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Phòng tập hiện đại</h3>
                    <p class="text-gray-600">Trang thiết bị tập luyện cao cấp 24/7</p>
                </div>
                
                <!-- Amenity 4 -->
                <div class="p-6">
                    <div class="bg-gray-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-concierge-bell text-3xl text-gray-800"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Dịch vụ concierge</h3>
                    <p class="text-gray-600">Hỗ trợ 24/7 cho mọi nhu cầu của quý khách</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Đặt phòng ngay hôm nay</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">Trải nghiệm kỳ nghỉ đẳng cấp tại Luxury Hotel với ưu đãi đặc biệt khi đặt trực tiếp qua website</p>
            <a href="{{ route('rooms.index') }}" class="inline-block bg-white text-gray-900 hover:bg-gray-100 py-3 px-8 rounded-full text-lg font-medium transition-all">Đặt phòng ngay</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-100 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-xl font-bold mb-4">Luxury Hotel</h3>
                    <p class="text-gray-600 mb-4">Nơi tận hưởng những trải nghiệm xa hoa và đẳng cấp</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-gray-900">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-900">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Liên kết</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Trang chủ</a></li>
                        <li><a href="#about" class="text-gray-600 hover:text-gray-900">Giới thiệu</a></li>
                        <li><a href="#rooms" class="text-gray-600 hover:text-gray-900">Phòng & Suites</a></li>
                        <li><a href="#dining" class="text-gray-600 hover:text-gray-900">Ẩm thực</a></li>
                        <li><a href="{{ route('rooms.index') }}" class="text-gray-600 hover:text-gray-900">Đặt phòng</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Liên hệ</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-gray-600"></i>
                            <span class="text-gray-600">123 Đường Luxury, Quận 1, TP.HCM</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-2 text-gray-600"></i>
                            <span class="text-gray-600">+84 28 1234 5678</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2 text-gray-600"></i>
                            <span class="text-gray-600">info@luxuryhotel.com</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Đăng ký nhận tin</h3>
                    <p class="text-gray-600 mb-4">Nhận thông tin về các chương trình khuyến mãi đặc biệt</p>
                    <form class="flex">
                        <input type="email" placeholder="Email của bạn" class="px-4 py-2 w-full border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r hover:bg-gray-700 focus:outline-none">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-8">
                <p class="text-gray-600 text-center">&copy; 2023 Luxury Hotel. Đã đăng ký bản quyền.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Simple scroll to section function
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    const headerOffset = 80;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Mobile menu toggle (simplified)
        const mobileMenuButton = document.querySelector('.md\\:hidden button');
        if(mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                alert('Menu mobile sẽ được hiển thị ở đây');
                // Implement full mobile menu functionality as needed
            });
        }
    </script>
</body>
</html> 