@extends('layouts.blade')

@section('content')

    <div class="relative min-h-screen bg-center sm:flex sm:justify-center sm:items-center bg-purple-900 selection:bg-indigo-500 selection:text-white">
        <div class="p-6 mx-auto max-w-md lg:p-8 w-full">
            <div class="flex justify-center mb-8">
                <img src="{{ Vite::asset('resources/images/symbol.png') }}" alt="Symbol of Boccob D&D 3rd ed. Players Handbook">
            </div>

            <div class="bg-gray-800/50 bg-gradient-to-bl from-gray-700/50 via-transparent ring-1 ring-inset ring-white/5 rounded-lg shadow-none p-8">
                <h1>Dashboard</h1>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-400">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
@endsection
