<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'LMS') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Header -->
    @isset($header)
        <header class="bg-white/80 backdrop-blur shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-6 py-6">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-12 border-t bg-white/80 backdrop-blur">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center text-gray-600 text-sm">

            <div>
                © {{ date('Y') }} <span class="font-semibold">Learning Management System</span>
            </div>

            <div class="mt-3 md:mt-0">
                Dibuat dengan Laravel & Tailwind CSS
            </div>

        </div>
    </footer>

</body>
</html>