<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kursus Online</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-700 min-h-screen">


<div class="min-h-screen flex items-center justify-center px-6">


<div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">


<div class="grid md:grid-cols-2">



<!-- Kiri -->

<div class="p-10 md:p-16">


<span class="bg-indigo-100 text-indigo-700
             px-5 py-2 rounded-full text-sm font-semibold">

🎓 Platform Belajar Online

</span>



<h1 class="mt-8 text-5xl font-bold text-gray-800 leading-tight">

Tingkatkan Skill
<span class="text-indigo-600">
Tanpa Batas
</span>

</h1>



<p class="mt-6 text-gray-600 text-lg leading-relaxed">

Belajar berbagai kursus profesional dengan mudah.
Akses materi kapan saja, di mana saja,
dan tingkatkan kemampuan bersama mentor terbaik.

</p>




<div class="mt-8 flex gap-4 flex-wrap">


<a href="{{ route('login') }}"
class="bg-indigo-600 hover:bg-indigo-700
text-white px-8 py-3 rounded-xl shadow-lg
transition">

🔐 Login

</a>




@if(Route::has('register'))

<a href="{{ route('register') }}"
class="border-2 border-indigo-600
text-indigo-600 hover:bg-indigo-50
px-8 py-3 rounded-xl transition">

📝 Register

</a>

@endif



</div>





<!-- Statistik -->

<div class="mt-12 grid grid-cols-3 gap-5">


<div class="text-center">

<h3 class="text-3xl font-bold text-indigo-600">
100+
</h3>

<p class="text-gray-500">
Kursus
</p>

</div>



<div class="text-center">

<h3 class="text-3xl font-bold text-indigo-600">
50+
</h3>

<p class="text-gray-500">
Mentor
</p>

</div>



<div class="text-center">

<h3 class="text-3xl font-bold text-indigo-600">
24/7
</h3>

<p class="text-gray-500">
Akses
</p>

</div>



</div>


</div>





<!-- Kanan -->

<div class="bg-indigo-50 flex items-center justify-center p-10">


<div class="text-center">


<div class="w-72 h-72 mx-auto
bg-gradient-to-br from-indigo-500 to-purple-600
rounded-full flex items-center justify-center
shadow-xl">


<div class="text-8xl">

📚

</div>


</div>



<h2 class="mt-8 text-3xl font-bold text-gray-800">

Mulai Belajar Hari Ini

</h2>



<p class="mt-4 text-gray-600">

Temukan ilmu baru dan raih tujuanmu.

</p>




<div class="mt-8 grid grid-cols-2 gap-4">


<div class="bg-white rounded-xl shadow p-4">

<div class="text-3xl">
💻
</div>

<p class="font-semibold mt-2">
Online Learning
</p>

</div>



<div class="bg-white rounded-xl shadow p-4">

<div class="text-3xl">
🚀
</div>

<p class="font-semibold mt-2">
Skill Baru
</p>

</div>


</div>


</div>


</div>



</div>


</div>


</body>

</html>