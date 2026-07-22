<x-guest-layout>

<div class="w-full">

    <!-- Header Login -->
    <div class="text-center mb-8">

        <div class="mx-auto w-20 h-20 
            bg-gradient-to-br from-indigo-600 to-purple-600
            rounded-full flex items-center justify-center
            shadow-lg">

            <span class="text-4xl">
                🎓
            </span>

        </div>


        <h1 class="mt-5 text-3xl font-bold text-gray-800">
            Login Kursus Online
        </h1>


        <p class="mt-2 text-gray-500">
            Masuk untuk mengakses dashboard Anda
        </p>

    </div>



    <!-- Session Status -->
    <x-auth-session-status 
        class="mb-4" 
        :status="session('status')" />



    <form method="POST" action="{{ route('login') }}">

        @csrf



        <!-- Email -->

        <div>

            <x-input-label 
                for="email" 
                value="Email" />


            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-xl"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Masukkan email"
                required
                autofocus />


            <x-input-error 
                :messages="$errors->get('email')" 
                class="mt-2" />

        </div>





        <!-- Password -->

        <div class="mt-5">


            <x-input-label
                for="password"
                value="Password" />


            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-xl"
                type="password"
                name="password"
                placeholder="Masukkan password"
                required />


            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />


        </div>





        <!-- Remember -->

        <div class="mt-5">

            <label class="inline-flex items-center">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm">


                <span class="ml-2 text-sm text-gray-600">
                    Ingat saya
                </span>


            </label>

        </div>






        <!-- Button -->

        <div class="mt-8">


            <button
                type="submit"
                class="w-full py-3 rounded-xl
                bg-gradient-to-r from-indigo-600 to-purple-600
                text-white font-bold text-lg
                hover:from-indigo-700 hover:to-purple-700
                transition shadow-lg">


                🔐 Login


            </button>


        </div>





        <!-- Register -->

        @if(Route::has('register'))

        <div class="mt-6 text-center">


            <p class="text-gray-600">


                Belum punya akun?


                <a href="{{ route('register') }}"
                    class="text-indigo-600 font-semibold hover:underline">


                    Daftar


                </a>


            </p>


        </div>

        @endif



    </form>


</div>


</x-guest-layout>