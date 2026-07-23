<a href="
@if(auth()->check())

    {{ auth()->user()->role == 'admin'
        ? route('admin.dashboard')
        : route('peserta.dashboard') }}

@else

    {{ url('/') }}

@endif
">

    <div class="flex items-center gap-3">

        <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow">

            LMS

        </div>


        <div class="hidden sm:block">

            <h1 class="font-bold text-gray-800 text-lg">
                Learning Management System
            </h1>

            <p class="text-xs text-gray-500">
                Platform Kursus Online
            </p>

        </div>

    </div>

</a>