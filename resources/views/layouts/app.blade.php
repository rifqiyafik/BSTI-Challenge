<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-purple-50 via-pink-50 to-blue-50 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b-4 border-gradient-to-r from-purple-500 to-pink-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('products.index') }}" class="text-2xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        💻 LaptopHub
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700 font-medium">Hi, {{ Auth::user()->name }}! 👋</span>
                        @role('admin')
                            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-bold hover:shadow-lg transition transform hover:scale-105">
                                Admin Panel
                            </a>
                        @endrole
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-full font-bold hover:bg-gray-700 transition transform hover:scale-105">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-purple-600 font-bold hover:text-purple-800 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-bold hover:shadow-lg transition transform hover:scale-105">
                            Sign Up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-8 text-center">
            <p class="text-gray-400">© 2025 LaptopHub. Made with 💜 by Gen Z for Gen Z</p>
        </div>
    </footer>
</body>
</html>
