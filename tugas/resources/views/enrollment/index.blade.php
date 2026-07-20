<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Data Enrollment
    </h2>
</x-slot>


<div class="py-12">

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow">

        <h1 class="text-2xl font-bold mb-5">
            Daftar Enrollment
        </h1>


        <table class="w-full border">

            <thead>
                <tr class="bg-gray-100">

                    <th class="border p-3">
                        Kursus
                    </th>

                    <th class="border p-3">
                        Peserta
                    </th>

                </tr>
            </thead>


            <tbody>

            @foreach($kursus as $item)

                <tr>

                    <td class="border p-3">
                        {{ $item->judul }}
                    </td>


                    <td class="border p-3">

                        @forelse($item->peserta as $peserta)

                            {{ $peserta->name }} <br>

                        @empty

                            Belum ada peserta

                        @endforelse

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>


    </div>

</div>

</x-app-layout>