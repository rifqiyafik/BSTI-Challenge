<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white h-screen p-5">
            <h2 class="text-2xl font-bold mb-5">Admin Panel</h2>

            <ul>
                <li class="mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-300">Dashboard</a>
                </li>

                <li class="mb-3">
                    <a href="{{ route('admin.products.index') }}" class="hover:text-yellow-300">Products</a>
                </li>
            </ul>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf
                <button class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 w-full text-white">
                    Logout
                </button>
            </form>

        </aside>

        <!-- Konten -->
        <main class="flex-1 p-10">
            @yield('content')
        </main>

    </div>

</body>

</html>
