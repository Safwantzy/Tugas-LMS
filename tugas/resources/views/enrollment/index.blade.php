<x-app-layout>

<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800">
        Data Enrollment
    </h2>

</x-slot>



<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 py-10">


<div class="max-w-7xl mx-auto px-6">



    <!-- Header -->

    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-3xl shadow-xl p-8 text-white mb-8">


        <div class="flex flex-col md:flex-row justify-between items-center">


            <div>

                <h1 class="text-3xl font-bold">
                    Manajemen Enrollment 🎓
                </h1>


                <p class="mt-2 text-blue-100">
                    Pantau peserta yang mengikuti setiap kursus.
                </p>

            </div>



            <div class="mt-5 md:mt-0 bg-white/20 backdrop-blur rounded-2xl px-6 py-4 text-center">


                <p class="text-sm text-blue-100">
                    Total Kursus
                </p>


                <p class="text-3xl font-bold">
                    {{ $kursus->count() }}
                </p>


            </div>


        </div>


    </div>





    <!-- Table Card -->

    <div class="bg-white/90 backdrop-blur rounded-3xl shadow-xl overflow-hidden">


        <div class="px-6 py-5 border-b">


            <h2 class="text-xl font-bold text-gray-800">

                📚 Daftar Peserta Kursus

            </h2>


        </div>





        <div class="overflow-x-auto">


            <table class="min-w-full">


                <thead class="bg-gray-100">


                    <tr>


                        <th class="px-6 py-4 text-left text-gray-600">

                            Kursus

                        </th>


                        <th class="px-6 py-4 text-left text-gray-600">

                            Jumlah Peserta

                        </th>


                        <th class="px-6 py-4 text-left text-gray-600">

                            Peserta Terdaftar

                        </th>


                    </tr>


                </thead>



                <tbody class="divide-y">



                @forelse($kursus as $item)



                    <tr class="hover:bg-blue-50 transition">



                        <!-- Kursus -->

                        <td class="px-6 py-5">


                            <div class="flex items-center gap-4">


                                @if($item->thumbnail)

                                    <img
                                    src="{{ asset('storage/'.$item->thumbnail) }}"
                                    class="w-14 h-14 rounded-xl object-cover shadow">


                                @else


                                    <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-2xl">

                                        📚

                                    </div>


                                @endif



                                <div>


                                    <h3 class="font-bold text-gray-800">

                                        {{ $item->judul }}

                                    </h3>


                                    <p class="text-sm text-gray-500">

                                        {{ $item->kategori }}

                                    </p>


                                </div>


                            </div>


                        </td>





                        <!-- Jumlah -->

                        <td class="px-6 py-5">


                            <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full font-semibold">


                                {{ $item->peserta->count() }} Peserta


                            </span>


                        </td>






                        <!-- Peserta -->

                        <td class="px-6 py-5">


                            @forelse($item->peserta as $peserta)



                                <div class="flex items-center gap-3 mb-3">


                                    <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($peserta->name) }}&background=4f46e5&color=fff"
                                    class="w-9 h-9 rounded-full">



                                    <div>


                                        <p class="font-medium text-gray-800">

                                            {{ $peserta->name }}

                                        </p>


                                        <p class="text-xs text-gray-500">

                                            {{ $peserta->email }}

                                        </p>


                                    </div>


                                </div>



                            @empty


                                <span class="text-gray-400 italic">

                                    Belum ada peserta

                                </span>


                            @endforelse



                        </td>




                    </tr>




                @empty


                    <tr>


                        <td colspan="3"
                            class="text-center py-10 text-gray-500">


                            Belum ada data enrollment.


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