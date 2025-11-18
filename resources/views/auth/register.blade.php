@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-5xl font-black bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Join Us! 🎊
            </h2>
            <p class="mt-2 text-gray-600 text-lg">Start your laptop journey today</p>
        </div>

        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border-2 border-blue-200">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                    <p class="font-bold">Oops! 😅</p>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                        Full Name 👤
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        required
                        value="{{ old('name') }}"
                        class="w-full px-4 py-3 rounded-xl border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition"
                        placeholder="Your awesome name"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                        Email Address 📧
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-xl border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition"
                        placeholder="your@email.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                        Password 🔒
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full px-4 py-3 rounded-xl border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition"
                        placeholder="Min. 8 characters"
                    >
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                        Confirm Password 🔐
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        class="w-full px-4 py-3 rounded-xl border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition"
                        placeholder="Type it again"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full py-4 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-black rounded-xl hover:shadow-2xl transition transform hover:scale-105 text-lg"
                >
                    Create Account! 🎉
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-800 transition">
                        Login here! 👈
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
