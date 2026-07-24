<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    ✏️ Edit Kursus
                </h2>

                <p class="text-gray-500 mt-1">
                    Perbarui informasi kursus dan thumbnail.
                </p>

            </div>

            <a href="{{ route('admin.kursus.index') }}"
                class="px-5 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                ← Kembali

            </a>

        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            @if($errors->any())

                <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-5">

                    <h3 class="font-semibold text-red-700 mb-3">
                        Terjadi Kesalahan
                    </h3>

                    <ul class="list-disc list-inside text-red-600 space-y-1">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="{{ route('admin.kursus.update',$kursus->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid lg:grid-cols-3 gap-8">

                    {{-- Preview --}}
                    <div>

                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sticky top-24">

                            <h3 class="font-bold text-xl text-gray-800 mb-5">
                                Preview
                            </h3>

                            @if($kursus->thumbnail)

                                <img
                                    src="{{ asset('storage/'.$kursus->thumbnail) }}"
                                    class="rounded-2xl w-full h-60 object-cover shadow">

                            @else

                                <div
                                    class="rounded-2xl h-60 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-7xl text-white">

                                    📚

                                </div>

                            @endif

                            <div class="mt-6">

                                <h4 class="text-xl font-bold text-gray-800">

                                    {{ $kursus->judul }}

                                </h4>

                                <span
                                    class="inline-block mt-3 px-4 py-1 rounded-full bg-indigo-100 text-indigo-700 text-sm">

                                    {{ $kursus->kategori }}

                                </span>

                            </div>

                        </div>

                    </div>

                    {{-- Form --}}
                    <div class="lg:col-span-2">

                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

                            <div class="space-y-6">

                                <div>

                                    <label class="block mb-2 font-semibold text-gray-700">
                                        Judul Kursus
                                    </label>

                                    <input
                                        type="text"
                                        name="judul"
                                        value="{{ old('judul',$kursus->judul) }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                                </div>

                                <div>

                                    <label class="block mb-2 font-semibold text-gray-700">
                                        Deskripsi
                                    </label>

                                    <textarea
                                        rows="6"
                                        name="deskripsi"
                                        class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('deskripsi',$kursus->deskripsi) }}</textarea>

                                </div>

                                <div>

                                    <label class="block mb-2 font-semibold text-gray-700">
                                        Kategori
                                    </label>

                                    <input
                                        type="text"
                                        name="kategori"
                                        value="{{ old('kategori',$kursus->kategori) }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                                </div>

                                <div>

                                    <label class="block mb-2 font-semibold text-gray-700">
                                        Thumbnail Baru
                                    </label>

                                    <input
                                        type="file"
                                        name="thumbnail"
                                        class="w-full rounded-xl border border-dashed border-indigo-300 p-4">

                                    <p class="text-sm text-gray-500 mt-2">
                                        Kosongkan jika tidak ingin mengganti gambar.
                                    </p>

                                </div>

                            </div>

                            <div class="flex justify-end gap-4 mt-10">

                                <a
                                    href="{{ route('admin.kursus.index') }}"
                                    class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                                    Batal

                                </a>

                                <button
                                    type="submit"
                                    class="px-8 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition">

                                    💾 Simpan Perubahan

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>