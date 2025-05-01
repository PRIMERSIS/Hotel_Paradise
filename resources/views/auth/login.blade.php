<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hotel-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .password-requirements {
            display: flex;
            gap: 18px;
        }
        .password-requirement-group {
            display: flex;
            flex-direction: column;
        }
        .password-requirement {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            transition: all 0.3s ease;
        }
        .password-requirement:hover {
            transform: translateX(5px);
        }
        .password-requirement:hover .password-requirement-dot {
            background-color: #111111;
        }
        .password-requirement:hover .password-requirement-text {
            color: #111111;
            font-weight: 500;
        }
        .password-requirement-dot {
            width: 8px;
            height: 8px;
            background-color: rgba(102, 102, 102, 0.6);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
        .password-requirement-text {
            color: rgba(102, 102, 102, 0.6);
            font-size: 14px;
            transition: color 0.3s ease, font-weight 0.3s ease;
        }
        .input-field {
            border: 1px solid rgba(102, 102, 102, 0.35);
            border-radius: 12px;
            padding: 12px 16px;
            color: #333333;
            width: 100%;
            background-color: #ffffff;
        }
        .hide-password {
            color: rgba(102, 102, 102, 0.8);
            font-size: 18px;
            cursor: pointer;
        }
        .btn-login {
            background-color: #111111;
            color: white;
            border-radius: 32px;
            padding: 12px 36px;
            font-size: 22px;
            font-weight: 500;
            cursor: pointer;
            opacity: 0.25;
            transition: opacity 0.3s;
        }
        .btn-login:hover {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-white">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img src="https://tse2.mm.bing.net/th?id=OIP.kmWpimDF9-XlssfFFmYEoAHaE7&pid=Api&P=0&h=220" alt="Hotel Logo" class="hotel-logo">
        </div>

        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 overflow-hidden">
            <!-- Form Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-medium text-gray-800">Welcome to Hotel Paradise</h1>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username/Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-600 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="input-field" autocomplete="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Field -->
                <div class="mb-2">
                    <div class="flex justify-between">
                        <label for="password" class="block text-gray-600 mb-1">Password</label>
                        <span class="hide-password">Hide</span>
                    </div>
                    <input id="password" type="password" name="password" required class="input-field" autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password Requirements -->
                <div class="password-requirements mb-6">
                    <div class="password-requirement-group">
                        <div class="password-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">Use 8 or more characters</span>
                        </div>
                        <div class="password-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One special character</span>
                        </div>
                    </div>
                    <div class="password-requirement-group">
                        <div class="password-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One Uppercase character</span>
                        </div>
                        <div class="password-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One number</span>
                        </div>
                    </div>
                    <div class="password-requirement-group">
                        <div class="password-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One lowercase character</span>
                        </div>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox" name="remember" class="h-5 w-5 text-gray-900">
                    <label for="remember_me" class="ml-2 text-gray-700">
                        I want to receive emails about the product, feature updates, events, and marketing promotions.
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col items-center">
                    <button type="submit" class="btn-login mb-4">Log In</button>
                    <p class="text-gray-600">Dont have any account? <a href="{{ route('register') }}" class="text-gray-600 hover:underline">SignUp</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.hide-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Hide' : 'Show';
        });
    </script>
</body>
</html>
