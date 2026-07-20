<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Online</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">

        <div class="bg-white shadow-lg rounded-lg p-10 text-center">

            <h1 class="text-4xl font-bold mb-4">
                Kursus Online
            </h1>

            <p class="text-gray-600 mb-8">
                Belajar berbagai kursus secara online dengan mudah.
            </p>

            @if (Route::has('login'))

                @auth

                    <a href="{{ url('/dashboard') }}"
                       class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="bg-blue-600 text-white px-6 py-3 rounded-lg mr-3">
                        Login
                    </a>

                    @if (Route::has('register'))

                        <a href="{{ route('register') }}"
                           class="bg-green-600 text-white px-6 py-3 rounded-lg">
                            Register
                        </a>

                    @endif

                @endauth

            @endif

        </div>

    </div>

</body>
</html>