<x-app-layout>

<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800">
        Tambah Kursus
    </h2>

</x-slot>


<div class="py-12 bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">


<form action="{{ route('admin.kursus.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf



    <div class="mb-5">

        <label class="block font-semibold mb-2">
            Judul Kursus
        </label>

        <input type="text"
               name="judul"
               class="w-full border rounded-lg p-3"
               value="{{ old('judul') }}"
               required>

    </div>




    <div class="mb-5">

        <label class="block font-semibold mb-2">
            Deskripsi
        </label>

        <textarea name="deskripsi"
                  rows="5"
                  class="w-full border rounded-lg p-3"
                  required>{{ old('deskripsi') }}</textarea>

    </div>




    <div class="mb-5">

        <label class="block font-semibold mb-2">
            Kategori
        </label>

        <input type="text"
               name="kategori"
               class="w-full border rounded-lg p-3"
               value="{{ old('kategori') }}"
               required>

    </div>




    <div class="mb-5">

        <label class="block font-semibold mb-2">
            Thumbnail
        </label>


        <input type="file"
               name="thumbnail"
               accept="image/*"
               class="w-full border rounded-lg p-3">


    </div>




    <button type="submit"
            class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

        Simpan Kursus

    </button>


</form>


</div>

</div>


</x-app-layout>