<x-app-layout>

<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800">
        Katalog Kursus
    </h2>

</x-slot>


<div class="py-12 bg-gray-100 min-h-screen">

<div class="max-w-7xl mx-auto px-6">


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">


@forelse($kursus as $item)


<div class="bg-white rounded-2xl shadow-lg overflow-hidden">


@if($item->thumbnail)

<img src="{{ asset('storage/'.$item->thumbnail) }}"
class="w-full h-48 object-cover">

@else

<div class="h-48 bg-gray-200 flex items-center justify-center">

Tidak ada gambar

</div>

@endif



<div class="p-5">


<span class="bg-indigo-100 text-indigo-700 
px-3 py-1 rounded-full text-sm">

{{ $item->kategori }}

</span>



<h3 class="text-xl font-bold mt-4">

{{ $item->judul }}

</h3>



<p class="text-gray-600 mt-3">

{{ Str::limit($item->deskripsi,120) }}

</p>



<a href="{{ route('kursus.show',$item->id) }}"
class="block mt-5 bg-indigo-600 
text-white text-center py-2 rounded-xl">

Lihat Detail

</a>


</div>


</div>


@empty


<div class="col-span-3 bg-white p-10 rounded-xl text-center">

Belum ada kursus tersedia

</div>


@endforelse


</div>



<div class="mt-8">

{{ $kursus->links() }}

</div>



</div>

</div>


</x-app-layout>