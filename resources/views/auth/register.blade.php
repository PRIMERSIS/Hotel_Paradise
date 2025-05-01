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
        .password-requirement.valid .password-requirement-dot {
            background-color: #28a745;
        }
        .password-requirement.valid .password-requirement-text {
            color: #28a745;
            font-weight: 500;
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
        .btn-signup {
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
        .btn-signup:hover {
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
                <p class="text-gray-600 mt-2">Already have an account? <a href="{{ route('login') }}" class="text-gray-600 hover:underline">Log in</a></p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-600 mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="input-field" autocomplete="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Username Field -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-600 mb-1">Username</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required class="input-field" autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password Field -->
                <div class="mb-2">
                    <div class="flex justify-between">
                        <label for="password" class="block text-gray-600 mb-1">Password</label>
                        <span class="hide-password">Hide</span>
                    </div>
                    <input id="password" type="password" name="password" required class="input-field" autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password Requirements -->
                <div class="password-requirements mb-6">
                    <div class="password-requirement-group">
                        <div class="password-requirement" id="length-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">Use 8 or more characters</span>
                        </div>
                        <div class="password-requirement" id="special-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One special character</span>
                        </div>
                    </div>
                    <div class="password-requirement-group">
                        <div class="password-requirement" id="uppercase-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One Uppercase character</span>
                        </div>
                        <div class="password-requirement" id="number-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One number</span>
                        </div>
                    </div>
                    <div class="password-requirement-group">
                        <div class="password-requirement" id="lowercase-requirement">
                            <div class="password-requirement-dot"></div>
                            <span class="password-requirement-text">One lowercase character</span>
                        </div>
                    </div>
                </div>

                <!-- Password Confirmation - Hidden but Required -->
                <div class="hidden">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" value="password-confirmation-placeholder">
                </div>

                <!-- Newsletter Checkbox -->
                <div class="flex items-center mb-6">
                    <input id="newsletter" type="checkbox" name="newsletter" class="h-5 w-5 text-gray-900">
                    <label for="newsletter" class="ml-2 text-gray-700">I want to receive emails about the product, feature updates, events, and marketing promotions.</label>
                </div>

                <!-- Terms of Use -->
                <div class="mb-8">
                    <p class="text-gray-600">By creating an account, you agree to the <a href="#" class="text-gray-600 hover:underline">Terms of use</a> and <a href="#" class="text-gray-600 hover:underline">Privacy Policy</a>.</p>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col items-center">
                    <button type="submit" class="btn-signup mb-4">Create an account</button>
                    <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-gray-600 hover:underline">Log in</a></p>
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

        // Set password confirmation to match password on submit
        document.querySelector('form').addEventListener('submit', function(e) {
            document.getElementById('password_confirmation').value = document.getElementById('password').value;
        });

        // Check password requirements
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            
            // Length requirement
            if (password.length >= 8) {
                document.getElementById('length-requirement').classList.add('valid');
            } else {
                document.getElementById('length-requirement').classList.remove('valid');
            }
            
            // Special character requirement
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                document.getElementById('special-requirement').classList.add('valid');
            } else {
                document.getElementById('special-requirement').classList.remove('valid');
            }
            
            // Uppercase requirement
            if (/[A-Z]/.test(password)) {
                document.getElementById('uppercase-requirement').classList.add('valid');
            } else {
                document.getElementById('uppercase-requirement').classList.remove('valid');
            }
            
            // Number requirement
            if (/[0-9]/.test(password)) {
                document.getElementById('number-requirement').classList.add('valid');
            } else {
                document.getElementById('number-requirement').classList.remove('valid');
            }
            
            // Lowercase requirement
            if (/[a-z]/.test(password)) {
                document.getElementById('lowercase-requirement').classList.add('valid');
            } else {
                document.getElementById('lowercase-requirement').classList.remove('valid');
            }
        });
    </script>
</body>
</html>
