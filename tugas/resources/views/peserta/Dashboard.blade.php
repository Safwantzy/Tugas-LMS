<x-app-layout>

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-8 text-white mb-8">
            <h1 class="text-3xl font-bold">
                Selamat Datang, {{ auth()->user()->name }} 👋
            </h1>

            <p class="mt-2 text-blue-100">
                Tetap semangat belajar dan selesaikan semua tugas tepat waktu.
            </p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-4xl mb-3">📚</div>
                <h2 class="text-3xl font-bold text-blue-600">
                    {{ $totalKelas }}
                </h2>
                <p class="text-gray-500 mt-2">
                    Kelas Diikuti
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-4xl mb-3">✅</div>
                <h2 class="text-3xl font-bold text-green-600">
                    {{ $materiSelesai }}
                </h2>
                <p class="text-gray-500 mt-2">
                    Materi Selesai
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-4xl mb-3">📝</div>
                <h2 class="text-3xl font-bold text-red-600">
                    {{ $tugasBelum }}
                </h2>
                <p class="text-gray-500 mt-2">
                    Tugas Belum
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-4xl mb-3">⭐</div>
                <h2 class="text-3xl font-bold text-purple-600">
                    {{ $nilaiRata }}
                </h2>
                <p class="text-gray-500 mt-2">
                    Nilai Rata-rata
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Kursus -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-xl shadow mb-8">

                    <div class="border-b px-6 py-4">
                        <h2 class="text-xl font-bold">
                            Kursus Saya
                        </h2>
                    </div>

                    <div class="p-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            @forelse($kelas as $item)

                                <div class="border rounded-xl p-5 hover:shadow-lg transition">

                                    <h3 class="text-xl font-bold">
                                        {{ $item->judul }}
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        {{ $item->deskripsi }}
                                    </p>

                                    <a href="{{ route('kursus.show',$item->id) }}"
                                       class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                                        Masuk Kursus

                                    </a>

                                </div>

                            @empty

                                <div class="col-span-2 bg-blue-100 text-blue-700 p-5 rounded-lg">

                                    Belum mengikuti kursus.

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

                <!-- Tugas -->
                <div class="bg-white rounded-xl shadow">

                    <div class="border-b px-6 py-4">
                        <h2 class="text-xl font-bold">
                            Tugas Terbaru
                        </h2>
                    </div>

                    <div class="overflow-x-auto">

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

                                            @if($item->status == 'Sudah')

                                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                                    Sudah
                                                </span>

                                            @else

                                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                                    Belum
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4" class="text-center py-6 text-gray-500">

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

                <div class="bg-white rounded-xl shadow mb-6">

                    <div class="border-b px-6 py-4">
                        <h2 class="text-xl font-bold">
                            Pengumuman
                        </h2>
                    </div>

                    <div class="p-6">

                        @forelse($pengumuman as $item)

                            <div class="mb-5">

                                <h3 class="font-semibold">
                                    {{ $item->judul }}
                                </h3>

                                <p class="text-gray-500 mt-1">
                                    {{ $item->isi }}
                                </p>

                                <small class="text-gray-400">
                                    {{ $item->created_at->format('d M Y') }}
                                </small>

                            </div>

                            <hr class="my-4">

                        @empty

                            <p class="text-gray-500">
                                Tidak ada pengumuman.
                            </p>

                        @endforelse

                    </div>

                </div>

                <div class="bg-white rounded-xl shadow">

                    <div class="border-b px-6 py-4">
                        <h2 class="text-xl font-bold">
                            Profil Peserta
                        </h2>
                    </div>

                    <div class="p-6 text-center">

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff&size=128"
                            class="mx-auto rounded-full mb-4"
                            alt="Avatar">

                        <h3 class="text-xl font-bold">
                            {{ auth()->user()->name }}
                        </h3>

                        <p class="text-gray-500 mt-2">
                            {{ auth()->user()->email }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>