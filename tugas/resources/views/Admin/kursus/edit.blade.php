<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Edit Kursus
    </h2>
</x-slot>


<div class="py-12 bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8">


@if($errors->any())

<div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">

<ul>

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif



<form action="{{ route('admin.kursus.update',$kursus->id) }}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')



<div class="mb-5">

<label class="block font-semibold mb-2">
Judul Kursus
</label>

<input type="text"
name="judul"
value="{{ old('judul',$kursus->judul) }}"
class="w-full border rounded-xl p-3">

</div>




<div class="mb-5">

<label class="block font-semibold mb-2">
Deskripsi
</label>

<textarea
name="deskripsi"
rows="5"
class="w-full border rounded-xl p-3">{{ old('deskripsi',$kursus->deskripsi) }}</textarea>

</div>




<div class="mb-5">

<label class="block font-semibold mb-2">
Kategori
</label>

<input type="text"
name="kategori"
value="{{ old('kategori',$kursus->kategori) }}"
class="w-full border rounded-xl p-3">

</div>




<div class="mb-5">

<label class="block font-semibold mb-2">
Thumbnail Saat Ini
</label>


@if($kursus->thumbnail)

<img src="{{ asset('storage/'.$kursus->thumbnail) }}"
class="w-48 h-32 object-cover rounded-xl mb-4">


@else

<p class="text-gray-500">
Tidak ada thumbnail
</p>

@endif



<label class="block font-semibold mb-2">
Upload Thumbnail Baru
</label>


<input type="file"
name="thumbnail"
class="w-full border rounded-xl p-3">


</div>




<button type="submit"
class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

Update Kursus

</button>



</form>


</div>

</div>


</x-app-layout>