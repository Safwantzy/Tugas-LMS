<x-app-layout>


<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 py-10">


<div class="max-w-7xl mx-auto px-6">



{{-- HEADER --}}

<div class="relative overflow-hidden rounded-3xl
bg-gradient-to-r from-indigo-600 via-blue-600 to-purple-700
p-10 text-white shadow-2xl mb-10">


<div class="absolute right-5 top-0 text-[180px] opacity-20">
📚
</div>



<div class="relative flex flex-col md:flex-row justify-between items-center">


<div>


<h1 class="text-5xl font-extrabold">
Kelola Kursus
</h1>


<p class="mt-3 text-indigo-100 text-lg">
Kelola seluruh kursus pada Learning Management System.
</p>


</div>



<button
onclick="openTambah()"
class="mt-6 md:mt-0
px-8 py-4
bg-white text-indigo-700
rounded-2xl
font-bold
shadow-xl
hover:scale-105
transition">

➕ Tambah Kursus

</button>



</div>


</div>





{{-- STATISTIK --}}

<div class="grid md:grid-cols-4 gap-6 mb-10">


<div class="bg-white rounded-3xl shadow-xl p-6">

<p class="text-gray-500">
Total Kursus
</p>

<h2 class="text-4xl font-bold text-indigo-600 mt-3">

{{ $kursus->total() }}

</h2>

</div>



<div class="bg-white rounded-3xl shadow-xl p-6">

<p class="text-gray-500">
Kategori
</p>

<h2 class="text-4xl font-bold text-purple-600 mt-3">

{{ $kursus->pluck('kategori')->unique()->count() }}

</h2>

</div>



<div class="bg-white rounded-3xl shadow-xl p-6">

<p class="text-gray-500">
Thumbnail
</p>

<h2 class="text-4xl font-bold text-green-600 mt-3">

{{ $kursus->whereNotNull('thumbnail')->count() }}

</h2>

</div>



<div class="bg-white rounded-3xl shadow-xl p-6">

<p class="text-gray-500">
Halaman
</p>

<h2 class="text-4xl font-bold text-orange-600 mt-3">

{{ $kursus->currentPage() }}

</h2>

</div>


</div>







@if(session('success'))

<div class="bg-green-100 border border-green-300
text-green-700 p-5 rounded-2xl mb-8">

✅ {{session('success')}}

</div>

@endif







{{-- TABLE --}}

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">



<div class="p-7 border-b">

<h2 class="text-2xl font-bold">

📋 Daftar Kursus

</h2>

</div>





<div class="overflow-x-auto">


<table class="w-full">



<thead class="bg-gray-50">


<tr>


<th class="px-6 py-5">
No
</th>


<th class="px-6 py-5">
Thumbnail
</th>


<th class="px-6 py-5 text-left">
Judul
</th>


<th class="px-6 py-5">
Kategori
</th>


<th class="px-6 py-5">
Deskripsi
</th>


<th class="px-6 py-5">
Aksi
</th>


</tr>


</thead>





<tbody>


@forelse($kursus as $item)



<tr class="border-t hover:bg-indigo-50 transition">



<td class="px-6 py-5">

{{$loop->iteration}}

</td>





<td class="px-6 py-5">


@if($item->thumbnail)

<img
src="{{asset('storage/'.$item->thumbnail)}}"
class="w-20 h-14 rounded-xl object-cover shadow">

@else

<div class="w-20 h-14 rounded-xl
bg-indigo-100 flex items-center justify-center">

📚

</div>

@endif


</td>





<td class="px-6 py-5">


<h3 class="font-bold text-gray-800">

{{$item->judul}}

</h3>


</td>





<td class="px-6 py-5">


<span class="px-4 py-2 rounded-full
bg-indigo-100 text-indigo-700 text-sm">

{{$item->kategori}}

</span>


</td>





<td class="px-6 py-5 text-gray-600">

{{Str::limit($item->deskripsi,60)}}

</td>





<td class="px-6 py-5">


<div class="flex justify-center gap-3">


<a
href="{{route('admin.kursus.edit',$item->id)}}"
class="w-10 h-10 rounded-full
bg-yellow-100 text-yellow-600
flex items-center justify-center
hover:bg-yellow-500 hover:text-white transition">

✏️

</a>




<button
onclick="openDelete(
'{{$item->id}}',
'{{$item->judul}}'
)"
class="w-10 h-10 rounded-full
bg-red-100 text-red-600
flex items-center justify-center
hover:bg-red-600 hover:text-white transition">

🗑️

</button>



</div>


</td>


</tr>




@empty


<tr>

<td colspan="6"
class="text-center py-12 text-gray-500">

Belum ada kursus

</td>

</tr>


@endforelse



</tbody>


</table>


</div>



<div class="p-6">

{{$kursus->links()}}

</div>


</div>


</div>


</div>









{{-- MODAL TAMBAH --}}

<div id="modalTambah"
class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm
flex items-center justify-center z-50">


<div class="bg-white rounded-3xl shadow-2xl
max-w-xl w-full p-8">


<h2 class="text-3xl font-bold mb-6">

➕ Tambah Kursus

</h2>



<form method="POST"
action="{{route('admin.kursus.store')}}"
enctype="multipart/form-data">

@csrf


<input
name="judul"
placeholder="Judul kursus"
class="w-full rounded-xl border-gray-300 mb-4"
required>


<input
name="kategori"
placeholder="Kategori"
class="w-full rounded-xl border-gray-300 mb-4"
required>


<textarea
name="deskripsi"
rows="5"
placeholder="Deskripsi"
class="w-full rounded-xl border-gray-300 mb-4"
required></textarea>


<input
type="file"
name="thumbnail"
class="w-full border rounded-xl p-3 mb-6">



<div class="flex justify-end gap-3">


<button
type="button"
onclick="closeTambah()"
class="px-6 py-3 rounded-xl bg-gray-200">

Batal

</button>


<button
class="px-6 py-3 rounded-xl
bg-gradient-to-r from-indigo-600 to-purple-600
text-white font-bold">

Simpan

</button>


</div>



</form>


</div>


</div>









{{-- MODAL HAPUS --}}


<div id="modalHapus"
class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm
flex items-center justify-center z-50">


<div class="bg-white rounded-3xl shadow-2xl
max-w-md w-full p-8 text-center">


<div class="text-6xl">

⚠️

</div>


<h2 class="text-3xl font-bold mt-5">

Hapus Kursus?

</h2>


<p class="text-gray-500 mt-3">

Anda akan menghapus:

</p>


<h3 id="namaHapus"
class="font-bold text-red-600 mt-2">

</h3>




<form id="formHapus"
method="POST"
class="mt-8">


@csrf

@method('DELETE')


<div class="flex gap-3">


<button
type="button"
onclick="closeDelete()"
class="flex-1 py-3 rounded-xl bg-gray-200">

Batal

</button>


<button
class="flex-1 py-3 rounded-xl
bg-red-600 text-white font-bold">

🗑️ Hapus

</button>


</div>


</form>



</div>


</div>









<script>


function openTambah(){

document.getElementById('modalTambah')
.classList.remove('hidden');

}



function closeTambah(){

document.getElementById('modalTambah')
.classList.add('hidden');

}




function openDelete(id,nama){

document.getElementById('modalHapus')
.classList.remove('hidden');


document.getElementById('namaHapus')
.innerText=nama;


document.getElementById('formHapus')
.action="/admin/kursus/"+id;


}



function closeDelete(){

document.getElementById('modalHapus')
.classList.add('hidden');

}



</script>



</x-app-layout>