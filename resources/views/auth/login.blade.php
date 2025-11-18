@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-5xl font-black bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 bg-clip-text text-transparent">
                Welcome Back! 🎉
            </h2>
            <p class="mt-2 text-gray-600 text-lg">Let's find your perfect laptop</p>
        </div>

        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border-2 border-purple-200">
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

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                        class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-200 transition"
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
                        class="w-full px-4 py-3 rounded-xl border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-200 transition"
                        placeholder="••••••••"
                    >
                </div>

                <div class="flex items-center">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                    >
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full py-4 px-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-black rounded-xl hover:shadow-2xl transition transform hover:scale-105 text-lg"
                >
                    Let's Go! 🚀
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-bold text-purple-600 hover:text-purple-800 transition">
                        Sign up now! ✨
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
