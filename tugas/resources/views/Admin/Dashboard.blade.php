<x-app-layout>

    <div class="p-10">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl shadow-lg">
                🚪 Logout
            </button>

        </form>

    </div>


    <div class="p-10">

        <h1 class="text-3xl font-bold mb-8">
            Dashboard Admin
        </h1>


        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">


            <div class="bg-blue-600 text-white rounded-2xl p-6 shadow">
                <h2 class="text-xl font-bold">
                    Total Kursus
                </h2>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalKursus }}
                </p>
            </div>


            <div class="bg-green-600 text-white rounded-2xl p-6 shadow">
                <h2 class="text-xl font-bold">
                    Category
                </h2>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalCategory }}
                </p>
            </div>


            <div class="bg-purple-600 text-white rounded-2xl p-6 shadow">
                <h2 class="text-xl font-bold">
                    Enrollment
                </h2>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalEnrollment }}
                </p>
            </div>


            <div class="bg-red-600 text-white rounded-2xl p-6 shadow">
                <h2 class="text-xl font-bold">
                    User
                </h2>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalUser }}
                </p>
            </div>


        </div>

    </div>

</x-app-layout>