<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kursus Online</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-700 min-h-screen">


<div class="min-h-screen flex items-center justify-center px-6">


    <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">


        <!-- Left Content -->

        <div class="p-10 md:p-16 flex flex-col justify-center">


            <div class="mb-5">

                <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm font-semibold">

                    Platform Belajar Online

                </span>

            </div>



            <h1 class="text-5xl font-bold text-gray-800 leading-tight">

                Tingkatkan Skill
                <span class="text-indigo-600">
                    Bersama Kursus Online
                </span>

            </h1>



            <p class="mt-6 text-gray-600 text-lg leading-relaxed">

                Belajar berbagai materi kursus dengan mudah.
                Temukan kursus terbaik, pelajari ilmu baru,
                dan tingkatkan kemampuan Anda kapan saja.

            </p>




            <div class="mt-8 flex gap-4">


                @if(Route::has('login'))

                    @auth

                        <a href="{{ url('/dashboard') }}"
                            class="bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow">

                            Dashboard

                        </a>


                    @else


                        <a href="{{ route('login') }}"
                            class="bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow">

                            Login

                        </a>



                        @if(Route::has('register'))

                            <a href="{{ route('register') }}"
                                class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-xl hover:bg-indigo-50 transition">

                                Register

                            </a>

                        @endif


                    @endauth


                @endif


            </div>



            <!-- Feature -->

            <div class="mt-10 grid grid-cols-3 gap-4">


                <div class="text-center">

                    <h3 class="text-2xl font-bold text-indigo-600">
                        100+
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Kursus
                    </p>

                </div>



                <div class="text-center">

                    <h3 class="text-2xl font-bold text-indigo-600">
                        Expert
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Mentor
                    </p>

                </div>



                <div class="text-center">

                    <h3 class="text-2xl font-bold text-indigo-600">
                        Online
                    </h3>

                    <p class="text-gray-500 text-sm">
                        Belajar
                    </p>

                </div>


            </div>


        </div>





        <!-- Right Illustration -->

        <div class="hidden md:flex bg-indigo-50 items-center justify-center p-10">


            <div class="text-center">


                <div class="w-72 h-72 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-xl">


                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-36 h-36 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"/>

                    </svg>


                </div>



                <h2 class="mt-8 text-3xl font-bold text-gray-800">

                    Mulai Belajar Hari Ini

                </h2>



                <p class="mt-3 text-gray-600">

                    Akses materi kapan saja dan di mana saja.

                </p>


            </div>


        </div>



    </div>


</div>


</body>

</html>