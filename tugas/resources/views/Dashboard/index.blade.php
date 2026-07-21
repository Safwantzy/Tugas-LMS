<x-app-layout>

<div class="min-h-screen bg-gray-100 p-8">

    <!-- Header -->
    <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

        <div class="flex flex-col md:flex-row justify-between items-center">

            <div>
                <h1 class="text-4xl font-bold text-gray-800">
                    Dashboard Admin 🎓
                </h1>

                <p class="mt-3 text-gray-500 text-lg">
                    Kelola sistem LMS, kursus, kategori, enrollment, dan pengguna.
                </p>

                <p class="mt-2 text-gray-600">
                    Selamat datang,
                    <span class="font-bold text-blue-600">
                        {{ Auth::user()->name }}
                    </span>
                </p>

            </div>


            <form method="POST" action="{{ route('logout') }}" class="mt-5 md:mt-0">

                @csrf

                <button type="submit"
                    class="flex items-center gap-2 bg-red-600 
                    hover:bg-red-700 text-white px-6 py-3 
                    rounded-2xl shadow-lg transition duration-300">

                    🚪 Logout

                </button>

            </form>


        </div>

    </div>



    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


        <!-- Kursus -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 
                    text-white rounded-3xl p-7 shadow-xl
                    hover:scale-105 transition">

            <div class="text-5xl mb-5">
                📚
            </div>

            <h2 class="text-xl font-semibold">
                Total Kursus
            </h2>

            <p class="text-5xl font-bold mt-3">
                {{ $totalKursus }}
            </p>

            <p class="mt-3 text-blue-100">
                Kursus tersedia
            </p>

        </div>




        <!-- Category -->
        <div class="bg-gradient-to-br from-green-500 to-green-700 
                    text-white rounded-3xl p-7 shadow-xl
                    hover:scale-105 transition">

            <div class="text-5xl mb-5">
                🗂️
            </div>

            <h2 class="text-xl font-semibold">
                Category
            </h2>

            <p class="text-5xl font-bold mt-3">
                {{ $totalCategory }}
            </p>

            <p class="mt-3 text-green-100">
                Kategori kursus
            </p>

        </div>




        <!-- Enrollment -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-700 
                    text-white rounded-3xl p-7 shadow-xl
                    hover:scale-105 transition">

            <div class="text-5xl mb-5">
                📝
            </div>

            <h2 class="text-xl font-semibold">
                Enrollment
            </h2>

            <p class="text-5xl font-bold mt-3">
                {{ $totalEnrollment }}
            </p>

            <p class="mt-3 text-purple-100">
                Peserta terdaftar
            </p>

        </div>




        <!-- User -->
        <div class="bg-gradient-to-br from-orange-500 to-red-600 
                    text-white rounded-3xl p-7 shadow-xl
                    hover:scale-105 transition">

            <div class="text-5xl mb-5">
                👥
            </div>

            <h2 class="text-xl font-semibold">
                User
            </h2>

            <p class="text-5xl font-bold mt-3">
                {{ $totalUser }}
            </p>

            <p class="mt-3 text-orange-100">
                Total pengguna
            </p>

        </div>


    </div>



    <!-- Menu Cepat -->
    <div class="mt-10 bg-white rounded-3xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Menu Cepat
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


            <a href="{{ route('category.index') }}"
                class="bg-blue-50 hover:bg-blue-100 
                rounded-2xl p-6 transition">

                <div class="text-4xl">
                    🗂️
                </div>

                <h3 class="font-bold text-lg mt-3">
                    Kelola Category
                </h3>

                <p class="text-gray-500">
                    Tambah dan edit kategori
                </p>

            </a>



            <a href="{{ route('kursus.index') }}"
                class="bg-green-50 hover:bg-green-100 
                rounded-2xl p-6 transition">

                <div class="text-4xl">
                    📚
                </div>

                <h3 class="font-bold text-lg mt-3">
                    Kelola Kursus
                </h3>

                <p class="text-gray-500">
                    Atur data kursus
                </p>

            </a>




            <a href="{{ route('enrollment.index') }}"
                class="bg-purple-50 hover:bg-purple-100 
                rounded-2xl p-6 transition">

                <div class="text-4xl">
                    📝
                </div>

                <h3 class="font-bold text-lg mt-3">
                    Enrollment
                </h3>

                <p class="text-gray-500">
                    Lihat data pendaftaran
                </p>

            </a>


        </div>

    </div>


</div>

</x-app-layout>