<x-app-layout>

<div class="min-h-screen bg-gray-100 p-8">

    <div class="max-w-7xl mx-auto">


        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 
                    rounded-3xl shadow-xl p-8 mb-8 text-white">

            <div class="flex flex-col md:flex-row 
                        justify-between items-center">


                <div>

                    <h1 class="text-4xl font-bold">
                        📚 Kelola Kursus
                    </h1>

                    <p class="mt-2 text-blue-100">
                        Tambah, edit, dan kelola semua kursus LMS
                    </p>

                </div>


                <button
                    onclick="document.getElementById('modalTambah').classList.remove('hidden')"
                    class="mt-5 md:mt-0 bg-white text-blue-700
                           px-6 py-3 rounded-xl font-bold shadow
                           hover:bg-blue-50 transition">

                    + Tambah Kursus

                </button>


            </div>

        </div>





        <!-- Alert -->
        @if(session('success'))

        <div class="bg-green-100 border border-green-300 
                    text-green-700 px-5 py-4 rounded-xl mb-6">

            ✅ {{ session('success') }}

        </div>

        @endif





        <!-- Table -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">


            <div class="p-6 border-b">

                <h2 class="text-2xl font-bold text-gray-800">

                    Daftar Kursus

                </h2>

            </div>




            <div class="overflow-x-auto">

            <table class="w-full">


                <thead class="bg-gray-100">


                    <tr>

                        <th class="p-4 text-left">
                            Judul
                        </th>


                        <th class="p-4 text-left">
                            Kategori
                        </th>


                        <th class="p-4 text-left">
                            Deskripsi
                        </th>


                        <th class="p-4 text-center">
                            Aksi
                        </th>

                    </tr>


                </thead>



                <tbody>


                @forelse($kursus as $item)


                <tr class="border-t hover:bg-gray-50">


                    <td class="p-4 font-semibold">

                        {{ $item->judul }}

                    </td>


                    <td class="p-4">

                        <span class="bg-blue-100 text-blue-700
                                     px-3 py-1 rounded-full text-sm">

                            {{ $item->kategori }}

                        </span>

                    </td>



                    <td class="p-4 text-gray-600">

                        {{ Str::limit($item->deskripsi,60) }}

                    </td>




                    <td class="p-4">


                        <div class="flex justify-center gap-2">


                            <a href="{{ route('admin.kursus.edit',$item->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600
                                      text-white px-4 py-2 rounded-lg">

                                ✏️

                            </a>



                            <form method="POST"
                                  action="{{ route('admin.kursus.destroy',$item->id) }}">

                                @csrf

                                @method('DELETE')


                                <button
                                onclick="return confirm('Hapus kursus ini?')"
                                class="bg-red-600 hover:bg-red-700
                                       text-white px-4 py-2 rounded-lg">

                                    🗑️

                                </button>


                            </form>


                        </div>


                    </td>


                </tr>


                @empty


                <tr>

                    <td colspan="4"
                        class="text-center p-10 text-gray-500">

                        Belum ada kursus

                    </td>

                </tr>


                @endforelse


                </tbody>


            </table>

            </div>



            <div class="p-6">

                {{ $kursus->links() }}

            </div>


        </div>


    </div>


</div>





<!-- MODAL TAMBAH KURSUS -->

<div id="modalTambah"
     class="hidden fixed inset-0 bg-black bg-opacity-50 
            flex items-center justify-center z-50">


<div class="bg-white rounded-3xl shadow-xl 
            w-full max-w-xl p-8">


<h2 class="text-2xl font-bold mb-6">

    ➕ Tambah Kursus Baru

</h2>



<form method="POST"
      action="{{ route('admin.kursus.store') }}"
      enctype="multipart/form-data">


@csrf



<label class="font-semibold">
    Judul Kursus
</label>

<input type="text"
       name="judul"
       class="w-full rounded-xl border-gray-300 mb-4"
       required>




<label class="font-semibold">
    Kategori
</label>

<input type="text"
       name="kategori"
       class="w-full rounded-xl border-gray-300 mb-4"
       required>




<label class="font-semibold">
    Deskripsi
</label>

<textarea
name="deskripsi"
class="w-full rounded-xl border-gray-300 mb-4"
rows="4"
required></textarea>




<label class="font-semibold">
    Thumbnail
</label>

<input type="file"
       name="thumbnail"
       class="w-full mb-6">





<div class="flex justify-end gap-3">


<button type="button"
onclick="document.getElementById('modalTambah').classList.add('hidden')"
class="px-5 py-3 bg-gray-300 rounded-xl">

Batal

</button>



<button
class="px-5 py-3 bg-blue-600 text-white rounded-xl">

Simpan Kursus

</button>


</div>


</form>


</div>

</div>


</x-app-layout>