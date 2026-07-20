<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Dashboard Admin
        </h2>
    </x-slot>

  <!-- Welcome Card -->
<div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 mb-8">


    <!-- Content -->
    <div class="px-8 py-6">

        <p class="text-lg text-gray-700">
            Selamat datang,
            <span class="font-bold text-blue-700">
                {{ auth()->user()->name }}
            </span>
        </p>


        <p class="mt-3 text-gray-500">
            Kelola kategori, kursus, dan enrollment melalui dashboard admin.
        </p>

    </div>

</div>
<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">

    <!-- Total Kursus -->
    <div class="bg-white rounded-xl shadow-md p-5 flex items-center justify-between">

        <div>
            <p class="text-gray-500 text-base">
                Total Kursus
            </p>

            <h2 class="text-3xl font-bold text-blue-600 mt-1">
                {{ $totalKursus }}
            </h2>
        </div>

        <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-3xl">
            📚
        </div>

    </div>


    <!-- Total Kategori -->
    <div class="bg-white rounded-xl shadow-md p-5 flex items-center justify-between">

        <div>
            <p class="text-gray-500 text-base">
                Total Kategori
            </p>

            <h2 class="text-3xl font-bold text-green-600 mt-1">
                {{ $totalKategori }}
            </h2>
        </div>

        <div class="w-14 h-14 rounded-full bg-green-100 flex kali center justify-center text-3xl">
            📂
        </div>

    </div>

</div>


<!-- Enrollment -->
<div class="bg-white rounded-xl shadow-md p-5 -mt-2">

    <div class="flex items-center justify-between">

        <div class="flex items-center">

            <div class="bg-purple-100 p-3 rounded-full text-3xl">
                📝
            </div>

            <div class="ml-4">

                <h3 class="text-xl font-bold text-gray-800">
                    Enrollment
                </h3>

                <p class="text-gray-500 mt-1">
                    Kelola peserta yang mengikuti kursus.
                </p>

            </div>

        </div>


        <a href="{{ route('enrollment.index') }}"
           class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-6 py-2 rounded-lg">

            Kelola

        </a>

    </div>

</div>

</x-app-layout>