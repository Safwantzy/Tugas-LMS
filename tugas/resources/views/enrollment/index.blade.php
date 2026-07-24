<x-app-layout>


<x-slot name="header">

<div class="flex items-center justify-between">

    <div>

        <h2 class="text-3xl font-bold text-gray-800">

            🎓 Data Enrollment

        </h2>

        <p class="text-gray-500 mt-1">

            Kelola peserta yang mengikuti kursus.

        </p>

    </div>


</div>

</x-slot>





<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 py-10">


<div class="max-w-7xl mx-auto px-6">





{{-- HERO --}}

<div class="relative overflow-hidden bg-gradient-to-r 
from-indigo-600 via-blue-600 to-purple-700
rounded-3xl shadow-2xl p-10 text-white mb-10">


<div class="absolute right-10 top-5 text-[150px] opacity-20">

🎓

</div>



<div class="relative">


<h1 class="text-5xl font-extrabold">

Manajemen Enrollment

</h1>


<p class="mt-3 text-indigo-100 text-lg">

Pantau perkembangan peserta dalam setiap kursus.

</p>


</div>



</div>







{{-- STATISTIC --}}

<div class="grid md:grid-cols-3 gap-6 mb-10">



<div class="bg-white rounded-3xl shadow-xl p-6 border">


<div class="flex justify-between">


<div>


<p class="text-gray-500">

Total Kursus

</p>


<h2 class="text-4xl font-bold text-indigo-600 mt-3">

{{ $kursus->count() }}

</h2>


</div>


<div class="text-5xl">

📚

</div>


</div>


</div>







<div class="bg-white rounded-3xl shadow-xl p-6 border">


<div class="flex justify-between">


<div>


<p class="text-gray-500">

Total Peserta

</p>


<h2 class="text-4xl font-bold text-green-600 mt-3">


{{ $kursus->sum(function($item){

return $item->peserta->count();

}) }}


</h2>


</div>


<div class="text-5xl">

👨‍🎓

</div>


</div>


</div>







<div class="bg-white rounded-3xl shadow-xl p-6 border">


<div class="flex justify-between">


<div>


<p class="text-gray-500">

Enrollment Aktif

</p>


<h2 class="text-4xl font-bold text-purple-600 mt-3">


{{ $kursus->sum(function($item){

return $item->peserta->count();

}) }}


</h2>


</div>


<div class="text-5xl">

🚀

</div>


</div>


</div>




</div>









{{-- TABLE --}}

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">



<div class="p-7 border-b">


<h2 class="text-2xl font-bold text-gray-800">

📋 Daftar Peserta Kursus

</h2>


<p class="text-gray-500 mt-1">

Informasi peserta berdasarkan kursus yang diikuti.

</p>


</div>







<div class="overflow-x-auto">


<table class="w-full">



<thead class="bg-gray-50">


<tr>


<th class="px-7 py-5 text-left text-gray-600">

Kursus

</th>


<th class="px-7 py-5 text-left text-gray-600">

Peserta

</th>


<th class="px-7 py-5 text-left text-gray-600">

Daftar Peserta

</th>


</tr>


</thead>








<tbody class="divide-y">



@forelse($kursus as $item)



<tr class="hover:bg-indigo-50 transition">





{{-- COURSE --}}

<td class="px-7 py-6">


<div class="flex items-center gap-5">



@if($item->thumbnail)


<img
src="{{asset('storage/'.$item->thumbnail)}}"
class="w-20 h-20 rounded-2xl object-cover shadow-lg">


@else


<div
class="w-20 h-20 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-4xl text-white">

📚

</div>


@endif






<div>


<h3 class="font-bold text-lg text-gray-800">

{{$item->judul}}

</h3>



<span class="inline-block mt-2 px-3 py-1 rounded-full
bg-indigo-100 text-indigo-700 text-sm font-semibold">

{{$item->kategori}}

</span>



</div>


</div>



</td>









{{-- COUNT --}}

<td class="px-7 py-6">


<div class="inline-flex items-center gap-2 
bg-green-100 text-green-700
px-5 py-3 rounded-2xl font-bold">


👥

{{$item->peserta->count()}}

Peserta


</div>


</td>









{{-- USERS --}}

<td class="px-7 py-6">



@if($item->peserta->count())


<div class="space-y-4">


@foreach($item->peserta as $peserta)



<div class="flex items-center gap-4">


<img
src="https://ui-avatars.com/api/?name={{urlencode($peserta->name)}}&background=6366f1&color=fff"
class="w-12 h-12 rounded-full shadow">


<div>


<p class="font-semibold text-gray-800">

{{$peserta->name}}

</p>


<p class="text-sm text-gray-500">

{{$peserta->email}}

</p>


</div>



</div>



@endforeach


</div>



@else


<div class="flex items-center gap-2 text-gray-400 italic">


<span class="text-xl">
😴
</span>


Belum ada peserta


</div>



@endif



</td>





</tr>




@empty




<tr>


<td colspan="3"
class="py-16 text-center">


<div class="text-6xl mb-4">

📭

</div>


<h3 class="text-xl font-bold text-gray-700">

Belum ada enrollment

</h3>


<p class="text-gray-500">

Data peserta kursus belum tersedia.

</p>


</td>


</tr>




@endforelse





</tbody>


</table>



</div>



</div>




</div>


</div>


</x-app-layout>