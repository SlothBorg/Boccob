@extends('layouts.app')

@section('content')

    <div class="relative min-h-screen bg-center sm:flex sm:justify-center sm:items-center bg-purple-900 selection:bg-indigo-500 selection:text-white">
        <div class="p-6 mx-auto max-w-md lg:p-8 w-full">
            <div class="flex justify-center mb-8">
                <img src="{{ Vite::asset('resources/images/symbol.png') }}" alt="Symbol of Boccob D&D 3rd ed. Players Handbook">
            </div>

            <div class="bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none p-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        @error('login')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="email"
                            value="{{ old('email') }}"
                            class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-4">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="password"
                            class="w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('password') border-red-500 @enderror"
                            required
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-indigo-600 text-white py-2.5 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition font-medium"
                    >
                        Sign in
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-400">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
@endsection
