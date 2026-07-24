<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'LMS') }}</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-50 via-indigo-50 to-purple-100 overflow-x-hidden">

    {{-- Background Decoration --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-80 h-80 bg-blue-300 rounded-full blur-3xl opacity-20"></div>

        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400 rounded-full blur-3xl opacity-20"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-cyan-300 rounded-full blur-3xl opacity-10 -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    {{-- Navigation --}}
    @auth
        <div class="sticky top-0 z-50 backdrop-blur-md bg-white/70 border-b border-white/40 shadow-sm">
            @include('layouts.navigation')
        </div>
    @endauth

    {{-- Header --}}
    @isset($header)
        <header class="py-8">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-lg border border-white/50 p-8 transition hover:shadow-xl">

                    {{ $header }}

                </div>
            </div>
        </header>
    @endisset

    {{-- Content --}}
    <main class="pb-10">
        <div class="max-w-7xl mx-auto px-6">

            <div
                class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-xl border border-white/40 p-8 transition-all duration-300 hover:shadow-2xl">

                {{ $slot }}

            </div>

        </div>
    </main>

    {{-- Footer --}}
    <footer class="mt-16 border-t border-white/30 bg-white/60 backdrop-blur-lg">
        <div
            class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center text-gray-600">

            <div>
                <h2 class="font-semibold text-lg text-gray-800">
                    {{ config('app.name', 'Learning Management System') }}
                </h2>

                <p class="text-sm mt-1">
                    Smart Learning Platform
                </p>
            </div>

            <div class="mt-4 md:mt-0 text-sm text-center md:text-right">
                <p>
                    © {{ date('Y') }} All Rights Reserved
                </p>

                <p class="text-gray-500">
                    Built with ❤️ Laravel & Tailwind CSS
                </p>
            </div>

        </div>
    </footer>

</body>

</html>