<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'LMS') }}
    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100">


    @auth

        @include('layouts.navigation')

    @endauth



    @isset($header)

        <header class="bg-white shadow border-b">

            <div class="max-w-7xl mx-auto px-6 py-6">

                {{ $header }}

            </div>

        </header>

    @endisset



    <main>

        <div class="max-w-7xl mx-auto px-6 py-8">

            {{ $slot }}

        </div>

    </main>



    <footer class="bg-white border-t mt-10">

        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-500 text-sm">

            © {{ date('Y') }}
            Learning Management System

        </div>

    </footer>


</body>

</html>