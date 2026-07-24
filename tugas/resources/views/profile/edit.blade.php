<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    👤 Profile Settings
                </h2>

                <p class="text-gray-500 mt-1">
                    Kelola informasi akun dan keamanan Anda.
                </p>

            </div>

        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid lg:grid-cols-3 gap-8">

                {{-- Profile Card --}}
                <div>

                    <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 sticky top-24">

                        <div class="flex flex-col items-center">

                            <div
                                class="w-28 h-28 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white text-5xl font-bold shadow-lg">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                            <h2 class="mt-6 text-2xl font-bold text-gray-800">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-gray-500">
                                {{ Auth::user()->email }}
                            </p>

                            <span
                                class="mt-5 px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-semibold">

                                Active User

                            </span>

                        </div>

                        <div class="mt-8 border-t pt-6 space-y-4">

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Status
                                </span>

                                <span class="font-semibold text-green-600">
                                    Online
                                </span>

                            </div>

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Joined
                                </span>

                                <span class="font-semibold">
                                    {{ Auth::user()->created_at->format('d M Y') }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Forms --}}
                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

                        <div class="mb-6">

                            <h3 class="text-xl font-bold text-gray-800">
                                ✏️ Informasi Profil
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Perbarui nama dan email akun Anda.
                            </p>

                        </div>

                        @include('profile.partials.update-profile-information-form')

                    </div>

                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

                        <div class="mb-6">

                            <h3 class="text-xl font-bold text-gray-800">
                                🔒 Ubah Password
                            </h3>

                            <p class="text-gray-500 mt-1">
                                Gunakan password yang kuat untuk keamanan akun.
                            </p>

                        </div>

                        @include('profile.partials.update-password-form')

                    </div>

                    <div class="bg-red-50 rounded-3xl shadow-xl border border-red-200 p-8">

                        <div class="mb-6">

                            <h3 class="text-xl font-bold text-red-700">
                                ⚠️ Danger Zone
                            </h3>

                            <p class="text-red-500 mt-1">
                                Menghapus akun akan menghilangkan seluruh data secara permanen.
                            </p>

                        </div>

                        @include('profile.partials.delete-user-form')

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>