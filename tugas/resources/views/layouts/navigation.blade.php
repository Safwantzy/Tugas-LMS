<nav class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ auth()->user()->role == 'admin'
                    ? route('admin.dashboard')
                    : route('peserta.dashboard') }}"
                class="flex items-center gap-4">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-r from-indigo-600 via-blue-600 to-purple-600 flex items-center justify-center text-white text-lg font-bold shadow-lg">

                    🎓

                </div>

                <div class="hidden md:block">

                    <h1 class="text-xl font-bold text-gray-800">
                        LMS Online
                    </h1>

                    <p class="text-xs text-gray-500">
                        Learning Management System
                    </p>

                </div>

            </a>

            {{-- Menu --}}
            <div class="hidden lg:flex items-center gap-3">

                @if(auth()->user()->role == 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                        🏠 Dashboard

                    </a>

                    <a href="{{ route('admin.kursus.index') }}"
                        class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('admin.kursus.*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                        📚 Kursus

                    </a>

                    <a href="{{ route('enrollment.index') }}"
                        class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('enrollment.*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                        👨‍🎓 Enrollment

                    </a>

                @else

                    <a href="{{ route('peserta.dashboard') }}"
                        class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('peserta.dashboard') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                        🏠 Dashboard

                    </a>

                    <a href="{{ route('kursus.catalog') }}"
                        class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('kursus.catalog') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                        📖 Katalog

                    </a>

                @endif

                <a href="{{ route('profile.edit') }}"
                    class="px-4 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition {{ request()->routeIs('profile.*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-600' }}">

                    ⚙️ Profil

                </a>

            </div>

            {{-- User --}}
            <div class="flex items-center gap-4">

                <div
                    class="hidden md:flex items-center gap-3 bg-gray-50 rounded-2xl px-4 py-2">

                    <div
                        class="w-11 h-11 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white flex items-center justify-center font-bold shadow">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <div>

                        <p class="font-semibold text-gray-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-gray-500 capitalize">
                            {{ Auth::user()->role }}
                        </p>

                    </div>

                </div>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-red-500 to-rose-600 text-white font-medium shadow-lg hover:shadow-xl hover:scale-105 transition">

                        Logout →

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>