<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Katalog Kursus
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Search & Filter -->
            <div class="bg-white rounded-2xl shadow-md p-6 mb-8">

                <form action="{{ route('kursus.catalog') }}" method="GET">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- Search -->
                        <div class="md:col-span-2">
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari judul kursus..."
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Filter Kategori -->
                        <div>
                            <select
                                name="kategori"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                                <option value="">Semua Kategori</option>

                                @foreach($kategori as $kat)
                                    <option
                                        value="{{ $kat }}"
                                        {{ request('kategori') == $kat ? 'selected' : '' }}>
                                        {{ $kat }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="flex gap-2">

                            <button
                                type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg">

                                Cari

                            </button>

                            <a
                                href="{{ route('kursus.catalog') }}"
                                class="flex-1 bg-gray-300 hover:bg-gray-400 text-center py-2 rounded-lg">

                                Reset

                            </a>

                        </div>

                    </div>

                </form>

            </div>

            <!-- Daftar Kursus -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @forelse($kursus as $item)

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">

                        @if($item->thumbnail)

                            <img
                                src="{{ asset('storage/'.$item->thumbnail) }}"
                                class="w-full h-48 object-cover">

                        @else

                            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">

                                Tidak ada gambar

                            </div>

                        @endif

                        <div class="p-5">

                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">

                                {{ $item->kategori }}

                            </span>

                            <h3 class="text-xl font-bold mt-4">

                                {{ $item->judul }}

                            </h3>

                            <p class="text-gray-600 mt-3">

                                {{ Str::limit($item->deskripsi, 120) }}

                            </p>

                            <a
                                href="{{ route('kursus.show', $item->id) }}"
                                class="block mt-5 bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 rounded-xl">

                                Lihat Detail

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-3 bg-white p-10 rounded-xl text-center text-gray-500">

                        Tidak ada kursus yang ditemukan.

                    </div>

                @endforelse

            </div>

            <!-- Pagination -->
            <div class="mt-8">

                {{ $kursus->links() }}

            </div>

        </div>

    </div>

</x-app-layout>