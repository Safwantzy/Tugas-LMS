<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 relative overflow-hidden">


    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-blue-300 rounded-full opacity-20 blur-3xl"></div>

    <div class="absolute top-40 right-0 w-96 h-96 bg-indigo-400 rounded-full opacity-20 blur-3xl"></div>


    <div class="relative max-w-7xl mx-auto px-6 py-8">


        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 rounded-3xl shadow-xl p-8 text-white mb-8">


            <div class="flex flex-col md:flex-row justify-between items-center">


                <div>

                    <h1 class="text-3xl md:text-4xl font-bold">

                        Selamat Datang,
                        {{ auth()->user()->name }} 👋

                    </h1>


                    <p class="mt-3 text-blue-100 text-lg">

                        Tetap semangat belajar dan tingkatkan kemampuan Anda setiap hari.

                    </p>


                </div>



                <div class="mt-5 md:mt-0">

                    <div class="bg-white/20 backdrop-blur px-6 py-4 rounded-2xl text-center">


                        <p class="text-sm text-blue-100">

                            Status

                        </p>


                        <p class="text-xl font-bold">

                            Peserta Aktif

                        </p>


                    </div>

                </div>


            </div>


        </div>





        <!-- Statistik -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">



            <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="text-4xl">

                    📚

                </div>


                <h2 class="text-3xl font-bold text-blue-600 mt-3">

                    {{ $totalKelas }}

                </h2>


                <p class="text-gray-500">

                    Kelas Diikuti

                </p>


            </div>





            <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="text-4xl">

                    ✅

                </div>


                <h2 class="text-3xl font-bold text-green-600 mt-3">

                    {{ $materiSelesai }}

                </h2>


                <p class="text-gray-500">

                    Materi Selesai

                </p>


            </div>





            <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="text-4xl">

                    📝

                </div>


                <h2 class="text-3xl font-bold text-red-600 mt-3">

                    {{ $tugasBelum }}

                </h2>


                <p class="text-gray-500">

                    Tugas Belum

                </p>


            </div>





            <div class="bg-white/80 backdrop-blur rounded-2xl shadow-lg p-6 hover:-translate-y-1 transition">


                <div class="text-4xl">

                    ⭐

                </div>


                <h2 class="text-3xl font-bold text-purple-600 mt-3">

                    {{ $nilaiRata }}

                </h2>


                <p class="text-gray-500">

                    Nilai Rata-rata

                </p>


            </div>



        </div>





        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


            <!-- Konten utama -->

            <div class="lg:col-span-2">


                <!-- Kursus -->

                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg mb-8">


                    <div class="border-b px-6 py-5">

                        <h2 class="text-xl font-bold">

                            📚 Kursus Saya

                        </h2>

                    </div>



                    <div class="p-6">


                        <div class="grid md:grid-cols-2 gap-5">


                            @forelse($kelas as $item)


                            <div class="border rounded-2xl p-5 hover:shadow-xl transition bg-white">


                                <h3 class="text-xl font-bold">

                                    {{ $item->judul }}

                                </h3>


                                <p class="text-gray-500 mt-2">

                                    {{ Str::limit($item->deskripsi,100) }}

                                </p>


                                <a href="{{ route('kursus.show',$item->id) }}"
                                   class="inline-block mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl">

                                    Masuk Kursus

                                </a>


                            </div>


                            @empty


                            <div class="md:col-span-2 bg-blue-100 text-blue-700 p-5 rounded-xl">

                                Belum mengikuti kursus.

                            </div>


                            @endforelse



                        </div>


                    </div>


                </div>






                <!-- Tugas -->

                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg">


                    <div class="border-b px-6 py-5">

                        <h2 class="text-xl font-bold">

                            📝 Tugas Terbaru

                        </h2>


                    </div>


                    <div class="p-6 overflow-x-auto">


                        <table class="min-w-full">


                            <thead class="bg-gray-100">

                                <tr>

                                    <th class="px-6 py-3 text-left">
                                        Judul
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Kelas
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Deadline
                                    </th>

                                    <th class="px-6 py-3 text-left">
                                        Status
                                    </th>

                                </tr>

                            </thead>



                            <tbody>


                            @forelse($tugas as $item)


                                <tr class="border-b">

                                    <td class="px-6 py-4">
                                        {{ $item->judul }}
                                    </td>


                                    <td class="px-6 py-4">
                                        {{ $item->kelas->nama_kelas ?? '-' }}
                                    </td>


                                    <td class="px-6 py-4">
                                        {{ $item->deadline }}
                                    </td>


                                    <td class="px-6 py-4">


                                        <span class="px-3 py-1 rounded-full text-sm
                                        {{ $item->status == 'Sudah'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700' }}">


                                            {{ $item->status }}


                                        </span>


                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="text-center py-6 text-gray-500">

                                        Tidak ada tugas.

                                    </td>

                                </tr>


                            @endforelse


                            </tbody>


                        </table>


                    </div>


                </div>


            </div>






            <!-- Sidebar -->

            <div>


                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg mb-6">


                    <div class="border-b px-6 py-5">

                        <h2 class="text-xl font-bold">

                            📢 Pengumuman

                        </h2>

                    </div>


                    <div class="p-6">


                        @forelse($pengumuman as $item)


                            <div class="mb-5">


                                <h3 class="font-semibold">

                                    {{ $item->judul }}

                                </h3>


                                <p class="text-gray-500 mt-2">

                                    {{ $item->isi }}

                                </p>


                                <small class="text-gray-400">

                                    {{ $item->created_at->format('d M Y') }}

                                </small>


                            </div>


                        @empty


                            <p class="text-gray-500">

                                Tidak ada pengumuman.

                            </p>


                        @endforelse


                    </div>


                </div>





                <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg">


                    <div class="border-b px-6 py-5">

                        <h2 class="text-xl font-bold">

                            👤 Profil Peserta

                        </h2>


                    </div>


                    <div class="p-6 text-center">


                        <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff&size=128"
                        class="mx-auto rounded-full mb-4 shadow-lg">


                        <h3 class="text-xl font-bold">

                            {{ auth()->user()->name }}

                        </h3>


                        <p class="text-gray-500">

                            {{ auth()->user()->email }}

                        </p>


                    </div>


                </div>


            </div>



        </div>


    </div>


</div>


</x-app-layout>