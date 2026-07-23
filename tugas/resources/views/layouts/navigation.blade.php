<nav class="bg-white shadow-lg border-b sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-16">


            <!-- Logo -->
            <div class="flex items-center space-x-3">

                <a href="{{ auth()->user()->role == 'admin'
                    ? route('admin.dashboard')
                    : route('peserta.dashboard') }}"
                    class="flex items-center space-x-3">


                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">

                        LMS

                    </div>


                    <div class="hidden sm:block">

                        <h1 class="font-bold text-xl text-gray-800">
                            Learning Management System
                        </h1>

                        <p class="text-xs text-gray-500">
                            Belajar kapan saja, di mana saja
                        </p>

                    </div>


                </a>


            </div>



            <!-- Menu -->

            <div class="hidden md:flex items-center space-x-6">


                @if(auth()->user()->role == 'admin')


                    <a href="{{ route('admin.dashboard') }}"
                       class="text-gray-700 hover:text-indigo-600 font-medium transition">

                        Dashboard

                    </a>



                    <a href="{{ route('admin.kursus.index') }}"
                       class="text-gray-700 hover:text-indigo-600 font-medium transition">

                        Kelola Kursus

                    </a>



                    <a href="{{ route('enrollment.index') }}"
                       class="text-gray-700 hover:text-indigo-600 font-medium transition">

                        Enrollment

                    </a>



                @else


                    <a href="{{ route('peserta.dashboard') }}"
                       class="text-gray-700 hover:text-indigo-600 font-medium transition">

                        Dashboard

                    </a>



                    <a href="{{ route('kursus.catalog') }}"
                       class="text-gray-700 hover:text-indigo-600 font-medium transition">

                        Katalog Kursus

                    </a>



                @endif



                <a href="{{ route('profile.edit') }}"
                   class="text-gray-700 hover:text-indigo-600 font-medium transition">

                    Profil

                </a>


            </div>





            <!-- User -->

            <div class="flex items-center space-x-4">


                <div class="hidden md:block text-right">


                    <p class="font-semibold text-gray-800">

                        {{ Auth::user()->name }}

                    </p>


                    <p class="text-xs text-gray-500 capitalize">

                        {{ Auth::user()->role }}

                    </p>


                </div>



                <!-- Avatar -->

                <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>



                <!-- Logout -->

                <form method="POST" action="{{ route('logout') }}">

                    @csrf


                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                        Logout

                    </button>


                </form>


            </div>



        </div>

    </div>

</nav>