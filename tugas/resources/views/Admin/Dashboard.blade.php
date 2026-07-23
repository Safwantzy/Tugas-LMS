<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 relative overflow-hidden">


    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-80 h-80 bg-blue-300 opacity-20 blur-3xl rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400 opacity-20 blur-3xl rounded-full"></div>



    <div class="relative max-w-7xl mx-auto px-6 py-10">



        <!-- Header -->

        <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500 rounded-3xl shadow-xl p-8 text-white mb-8">


            <div class="flex flex-col md:flex-row justify-between items-center">


                <div>


                    <h1 class="text-4xl font-bold">

                        Dashboard Admin 👋

                    </h1>


                    <p class="mt-3 text-blue-100 text-lg">

                        Kelola kursus, peserta, dan aktivitas pembelajaran dengan mudah.

                    </p>


                </div>



                <div class="mt-5 md:mt-0 bg-white/20 backdrop-blur rounded-2xl px-6 py-4 text-center">


                    <p class="text-sm text-blue-100">

                        Administrator

                    </p>


                    <p class="text-xl font-bold">

                        {{ auth()->user()->name }}

                    </p>


                </div>


            </div>


        </div>






        <!-- Statistik -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">



            <!-- Kursus -->

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="flex justify-between items-center">


                    <div>


                        <p class="text-gray-500">

                            Total Kursus

                        </p>


                        <h2 class="text-4xl font-bold text-blue-600 mt-3">

                            {{ $totalKursus }}

                        </h2>


                    </div>


                    <div class="text-5xl">

                        📚

                    </div>


                </div>


            </div>





            <!-- Category -->

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="flex justify-between items-center">


                    <div>


                        <p class="text-gray-500">

                            Kategori

                        </p>


                        <h2 class="text-4xl font-bold text-green-600 mt-3">

                            {{ $totalCategory }}

                        </h2>


                    </div>


                    <div class="text-5xl">

                        🗂️

                    </div>


                </div>


            </div>





            <!-- Enrollment -->

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="flex justify-between items-center">


                    <div>


                        <p class="text-gray-500">

                            Enrollment

                        </p>


                        <h2 class="text-4xl font-bold text-purple-600 mt-3">

                            {{ $totalEnrollment }}

                        </h2>


                    </div>


                    <div class="text-5xl">

                        🎓

                    </div>


                </div>


            </div>





            <!-- User -->

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="flex justify-between items-center">


                    <div>


                        <p class="text-gray-500">

                            User

                        </p>


                        <h2 class="text-4xl font-bold text-red-600 mt-3">

                            {{ $totalUser }}

                        </h2>


                    </div>


                    <div class="text-5xl">

                        👥

                    </div>


                </div>


            </div>



        </div>






        <!-- Menu Cepat -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">



            <a href="{{ route('admin.kursus.index') }}"
               class="bg-white rounded-2xl shadow-lg p-6 hover:bg-indigo-50 transition">


                <div class="text-4xl mb-3">

                    📖

                </div>


                <h3 class="text-xl font-bold">

                    Kelola Kursus

                </h3>


                <p class="text-gray-500 mt-2">

                    Tambah, edit, dan hapus kursus.

                </p>


            </a>





            <a href="{{ route('category.index') }}"
               class="bg-white rounded-2xl shadow-lg p-6 hover:bg-green-50 transition">


                <div class="text-4xl mb-3">

                    🗂️

                </div>


                <h3 class="text-xl font-bold">

                    Kelola Kategori

                </h3>


                <p class="text-gray-500 mt-2">

                    Atur kategori pembelajaran.

                </p>


            </a>





            <a href="{{ route('enrollment.index') }}"
               class="bg-white rounded-2xl shadow-lg p-6 hover:bg-purple-50 transition">


                <div class="text-4xl mb-3">

                    🎓

                </div>


                <h3 class="text-xl font-bold">

                    Enrollment

                </h3>


                <p class="text-gray-500 mt-2">

                    Lihat peserta yang mengikuti kursus.

                </p>


            </a>



        </div>






        <!-- Logout -->

        <div class="bg-white rounded-2xl shadow-lg p-6 flex justify-between items-center">


            <div>

                <h3 class="font-bold text-lg">

                    Selesai bekerja?

                </h3>


                <p class="text-gray-500">

                    Keluar dari akun administrator.

                </p>


            </div>



            <form method="POST" action="{{ route('logout') }}">

                @csrf


                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl shadow">


                    🚪 Logout


                </button>


            </form>


        </div>




    </div>


</div>


</x-app-layout>