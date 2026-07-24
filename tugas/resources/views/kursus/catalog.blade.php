<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    📚 Katalog Kursus
                </h2>

                <p class="text-gray-500 mt-1">
                    Temukan kursus terbaik untuk meningkatkan kemampuanmu.
                </p>
            </div>

        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            {{-- Hero --}}
            <div class="mb-10 rounded-3xl overflow-hidden bg-gradient-to-r from-indigo-600 via-blue-600 to-purple-700 p-10 text-white shadow-2xl">

                <div class="grid lg:grid-cols-2 gap-8 items-center">

                    <div>

                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Belajar Skill Baru
                            Kapan Saja
                        </h1>

                        <p class="mt-5 text-indigo-100 text-lg">
                            Jelajahi berbagai kursus profesional
                            dari mentor terbaik.
                        </p>

                    </div>

                    <div class="hidden lg:flex justify-center">

                        <div class="text-9xl">
                            🎓
                        </div>

                    </div>

                </div>

            </div>

            {{-- Filter --}}
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-10 border border-gray-100">

                <form method="GET"
                    action="{{ route('kursus.catalog') }}"
                    class="grid lg:grid-cols-12 gap-5">

                    <div class="lg:col-span-6">

                        <label class="text-sm font-semibold text-gray-700">
                            Cari Kursus
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="🔍 Cari berdasarkan judul..."
                            class="mt-2 w-full rounded-xl border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">

                    </div>

                    <div class="lg:col-span-4">

                        <label class="text-sm font-semibold text-gray-700">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="mt-2 w-full rounded-xl border-gray-300 focus:ring-indigo-500">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($kategori as $item)

                                <option
                                    value="{{ $item }}"
                                    {{ request('kategori')==$item ? 'selected' : '' }}>

                                    {{ $item }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="lg:col-span-2 flex items-end">

                        <button
                            class="w-full rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 font-semibold shadow-lg hover:scale-105 transition">

                            Cari

                        </button>

                    </div>

                </form>

            </div>

            {{-- Cards --}}
            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">

                @forelse($kursus as $item)

                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                        {{-- Thumbnail --}}
                        <div class="relative">

                            @if($item->thumbnail)

                                <img
                                    src="{{ asset('storage/'.$item->thumbnail) }}"
                                    class="w-full h-60 object-cover">

                            @else

                                <div class="h-60 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-7xl text-white">
                                    📘
                                </div>

                            @endif

                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-1 rounded-full text-sm font-semibold text-indigo-600">

                                {{ $item->kategori }}

                            </span>

                        </div>

                        {{-- Content --}}
                        <div class="p-6">

                            <h3 class="text-2xl font-bold text-gray-800 line-clamp-2">

                                {{ $item->judul }}

                            </h3>

                            <p class="mt-4 text-gray-500 line-clamp-3">

                                {{ $item->deskripsi }}

                            </p>

                            <div class="flex justify-between items-center mt-8">

                                <div>

                                    <p class="text-xs text-gray-400">
                                        Kategori
                                    </p>

                                    <p class="font-semibold text-indigo-600">
                                        {{ $item->kategori }}
                                    </p>

                                </div>

                                <a
                                    href="{{ route('kursus.show',$item->id) }}"
                                    class="px-5 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:shadow-xl transition">

                                    Detail →

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full">

                        <div class="bg-white rounded-3xl shadow-xl p-16 text-center">

                            <div class="text-7xl mb-6">
                                📚
                            </div>

                            <h2 class="text-3xl font-bold text-gray-700">
                                Kursus Tidak Ditemukan
                            </h2>

                            <p class="mt-3 text-gray-500">
                                Coba ubah kata kunci pencarian atau pilih kategori lain.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="mt-12">

                {{ $kursus->links() }}

            </div>

        </div>

    </div>

</x-app-layout>