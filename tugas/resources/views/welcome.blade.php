<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name','LMS') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-950 overflow-x-hidden">

    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-600 rounded-full blur-[150px] opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-purple-600 rounded-full blur-[170px] opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-[350px] h-[350px] bg-cyan-500 rounded-full blur-[150px] opacity-30 -translate-x-1/2 -translate-y-1/2"></div>

    </div>

    {{-- Navbar --}}
    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-2xl shadow-lg">
                🎓
            </div>

            <div>

                <h1 class="text-white text-xl font-bold">
                    LMS Online
                </h1>

                <p class="text-slate-400 text-sm">
                    Learning Platform
                </p>

            </div>

        </div>

        <div class="flex gap-4">

            <a href="{{ route('login') }}"
                class="px-6 py-2 rounded-xl text-white hover:bg-white/10 transition">

                Login

            </a>

            @if(Route::has('register'))

                <a href="{{ route('register') }}"
                    class="px-6 py-2 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg hover:scale-105 transition">

                    Register

                </a>

            @endif

        </div>

    </nav>

    {{-- Hero --}}
    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Left --}}
            <div>

                <span class="inline-block px-5 py-2 rounded-full bg-indigo-500/20 border border-indigo-500/40 text-indigo-300">
                    🚀 Platform Belajar Modern
                </span>

                <h1 class="mt-8 text-6xl font-extrabold text-white leading-tight">

                    Belajar
                    <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent">
                        Lebih Pintar
                    </span>

                    Bersama Mentor Terbaik

                </h1>

                <p class="mt-8 text-slate-300 text-lg leading-8">

                    Tingkatkan kemampuanmu melalui berbagai kelas online,
                    materi interaktif, kuis, sertifikat, dan pembelajaran
                    yang dapat diakses kapan saja.

                </p>

                <div class="mt-10 flex gap-5 flex-wrap">

                    <a href="{{ route('login') }}"
                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold shadow-xl hover:scale-105 transition">

                        🚀 Mulai Belajar

                    </a>

                    @if(Route::has('register'))

                    <a href="{{ route('register') }}"
                        class="px-8 py-4 rounded-2xl border border-slate-600 text-white hover:bg-white/10 transition">

                        Daftar Gratis

                    </a>

                    @endif

                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-5 mt-16">

                    <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-6 text-center border border-white/10">

                        <h2 class="text-4xl font-bold text-white">
                            100+
                        </h2>

                        <p class="text-slate-400 mt-2">
                            Kursus
                        </p>

                    </div>

                    <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-6 text-center border border-white/10">

                        <h2 class="text-4xl font-bold text-white">
                            50+
                        </h2>

                        <p class="text-slate-400 mt-2">
                            Mentor
                        </p>

                    </div>

                    <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-6 text-center border border-white/10">

                        <h2 class="text-4xl font-bold text-white">
                            24/7
                        </h2>

                        <p class="text-slate-400 mt-2">
                            Akses
                        </p>

                    </div>

                </div>

            </div>

            {{-- Right --}}
            <div class="flex justify-center">

                <div class="relative">

                    <div class="w-[420px] h-[420px] rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 blur-3xl opacity-40 absolute"></div>

                    <div class="relative bg-white/10 backdrop-blur-2xl border border-white/20 rounded-[40px] p-10 shadow-2xl">

                        <div class="text-center">

                            <div class="text-9xl">
                                📚
                            </div>

                            <h2 class="text-3xl text-white font-bold mt-6">
                                Belajar Tanpa Batas
                            </h2>

                            <p class="text-slate-300 mt-4">
                                Materi • Video • Quiz • Sertifikat
                            </p>

                        </div>

                        <div class="grid grid-cols-2 gap-5 mt-10">

                            <div class="bg-white/10 rounded-2xl p-5 text-center">

                                <div class="text-4xl">💻</div>

                                <p class="text-white mt-3 font-semibold">
                                    Online Class
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-5 text-center">

                                <div class="text-4xl">🏆</div>

                                <p class="text-white mt-3 font-semibold">
                                    Sertifikat
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-5 text-center">

                                <div class="text-4xl">📖</div>

                                <p class="text-white mt-3 font-semibold">
                                    Modul
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-5 text-center">

                                <div class="text-4xl">🚀</div>

                                <p class="text-white mt-3 font-semibold">
                                    Skill
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>