<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Katalog Kursus
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- Filter -->
            <div class="bg-white p-6 rounded-xl shadow mb-8">

                <form method="GET" action="{{ route('kursus.catalog') }}"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4">


                    <!-- Search -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cari Kursus
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari berdasarkan judul..."
                            class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">

                    </div>



                    <!-- Kategori -->
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="w-full rounded-lg border-gray-300">

                            <option value="">
                                Semua Kategori
                            </option>


                            @foreach($kategori as $item)

                                <option value="{{ $item }}"
                                    {{ request('kategori') == $item ? 'selected' : '' }}>

                                    {{ $item }}

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <!-- Button -->
                    <div class="flex items-end">

                        <button
                            class="w-full bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition">

                            Cari Kursus

                        </button>

                    </div>


                </form>

            </div>




            <!-- List Kursus -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                @forelse($kursus as $item)


                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">


                        <!-- Thumbnail -->
                        <div class="h-48 bg-gray-200">

                            @if($item->thumbnail)

                                <img
                                    src="{{ asset('storage/'.$item->thumbnail) }}"
                                    class="w-full h-full object-cover">

                            @else

                                <div class="flex items-center justify-center h-full text-gray-400">

                                    Tidak ada gambar

                                </div>

                            @endif


                        </div>



                        <!-- Content -->
                        <div class="p-5">


                            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full mb-3">

                                {{ $item->kategori }}

                            </span>



                            <h3 class="text-xl font-bold text-gray-800 mb-2">

                                {{ $item->judul }}

                            </h3>



                            <p class="text-gray-600 text-sm line-clamp-3">

                                {{ $item->deskripsi }}

                            </p>



                            <div class="mt-5">

                                <a href="{{ route('kursus.show',$item->id) }}"
                                    class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">

                                    Lihat Detail

                                </a>

                            </div>


                        </div>


                    </div>



                @empty


                    <div class="col-span-3 text-center bg-white p-10 rounded-xl shadow">

                        <h3 class="text-xl font-semibold text-gray-700">

                            Kursus tidak ditemukan

                        </h3>

                        <p class="text-gray-500 mt-2">

                            Coba gunakan kata kunci pencarian lain.

                        </p>

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