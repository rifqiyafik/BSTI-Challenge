<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome untuk Icon: Penting! -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJzLQQ1k4eA2XgWFGwE5u4N2I/o7Vv83dE7B15I/5O+326Wz14v0lW9qWz2O5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts Gen Z -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-purple-100 via-blue-100 to-pink-100 font-[Poppins] min-h-screen">

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-72 bg-white/40 backdrop-blur-xl shadow-xl border-r border-white/30 min-h-screen p-6">

            <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-500 to-pink-500 text-transparent bg-clip-text mb-8">
                Admin Panel
            </h2>

            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                        <i class="fa-solid fa-chart-line text-purple-600"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.products.index') }}"
                       class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                        <i class="fa-solid fa-box text-blue-600"></i>
                        <span>Products</span>
                    </a>
                </li>
            </ul>

            <form action="{{ route('logout') }}" method="POST" class="mt-10">
                @csrf
                <button
                    class="w-full py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl shadow hover:scale-105 transition">
                    Logout
                </button>
            </form>

        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-10">
            @yield('content')
        </main>

    </div>

</body>
</html>
