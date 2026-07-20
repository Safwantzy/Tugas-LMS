<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- Welcome Card -->
            <div class="bg-white shadow-lg rounded-xl p-8 mb-8">

                <h1 class="text-3xl font-bold text-gray-800 mb-3">
                    Dashboard Admin LMS
                </h1>

                <p class="text-gray-600 text-lg">
                    Selamat datang,
                    <span class="font-semibold text-blue-600">
                        {{ auth()->user()->name }}
                    </span>
                </p>

                <p class="mt-2 text-gray-500">
                    Kelola kategori dan kursus pembelajaran melalui menu di bawah.
                </p>

            </div>



            <!-- Menu Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">



                <!-- Category -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="flex items-center mb-4">

                        <div class="bg-blue-100 p-3 rounded-full">

                            📂

                        </div>

                        <h3 class="ml-4 text-xl font-bold text-gray-800">
                            Category
                        </h3>

                    </div>


                    <p class="text-gray-600 mb-5">
                        Tambahkan dan kelola kategori kursus LMS.
                    </p>


                    <a href="{{ route('category.index') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition">

                        Kelola Category

                    </a>


                </div>





                <!-- Kursus -->
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">


                    <div class="flex items-center mb-4">

                        <div class="bg-green-100 p-3 rounded-full">

                            📚

                        </div>


                        <h3 class="ml-4 text-xl font-bold text-gray-800">
                            Kursus
                        </h3>

                    </div>

<div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold text-gray-800">
        Data Kursus
    </h2>


    <a href="{{ route('kursus.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">

        + Tambah Kursus

    </a>

</div>



                </div>



            </div>




            <!-- Statistik -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">


                <div class="bg-white rounded-xl shadow p-6">

                    <h4 class="text-gray-500">
                        Total Kursus
                    </h4>
<p class="text-3xl font-bold text-blue-600">
    {{ $totalKursus }}
</p>

                </div>



                <div class="bg-white rounded-xl shadow p-6">

                    <h4 class="text-gray-500">
                        Total Kategori
                    </h4>

                    <p class="text-3xl font-bold text-green-600">
                     {{ $totalKategori }}
                    </p>

                </div>



                <div class="bg-white rounded-xl shadow p-6">

                    <h4 class="text-gray-500">
                        Status
                    </h4>

                    <p class="text-xl font-bold text-purple-600">
                        Aktif
                    </p>

                </div>


            </div>



        </div>

    </div>
<!-- Enrollment -->

<div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

    <div class="flex items-center mb-4">

        <div class="bg-purple-100 p-3 rounded-full">
            📝
        </div>

        <h3 class="ml-4 text-xl font-bold text-gray-800">
            Enrollment
        </h3>

    </div>


    <p class="text-gray-600 mb-5">
        Kelola peserta yang mengikuti kursus.
    </p>


    <a href="{{ route('enrollment.index') }}"
       class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg">

        Kelola Enrollment

    </a>

</div>
</x-app-layout>