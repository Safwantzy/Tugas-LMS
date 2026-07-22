<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Kursus
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">


                <!-- Thumbnail -->

                <div class="h-72 bg-gray-200">

                    @if($kursus->thumbnail)

                        <img 
                            src="{{ asset('storage/'.$kursus->thumbnail) }}"
                            class="w-full h-full object-cover">

                    @else

                        <div class="flex items-center justify-center h-full text-gray-400">

                            Tidak ada thumbnail

                        </div>

                    @endif

                </div>




                <!-- Content -->

                <div class="p-8">


                    <!-- Category -->

                    <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm">

                        {{ $kursus->kategori }}

                    </span>



                    <h1 class="text-4xl font-bold text-gray-800 mt-5">

                        {{ $kursus->judul }}

                    </h1>




                    <div class="mt-6">

                        <h3 class="text-xl font-semibold text-gray-700 mb-3">

                            Deskripsi Kursus

                        </h3>


                        <p class="text-gray-600 leading-relaxed">

                            {{ $kursus->deskripsi }}

                        </p>

                    </div>




                    <!-- Action -->

                    <div class="mt-8 flex gap-4">


                        @if(auth()->user()->role == 'peserta')

                            <form action="{{ route('kursus.enroll',$kursus->id) }}"
                                method="POST">

                                @csrf


                                <button
                                    class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">

                                    Ikuti Kursus

                                </button>


                            </form>

                        @endif




                        <a href="{{ route('kursus.catalog') }}"
                            class="bg-gray-500 text-white px-6 py-3 rounded-xl hover:bg-gray-600">

                            Kembali

                        </a>


                    </div>


                </div>


            </div>


        </div>

    </div>


</x-app-layout>