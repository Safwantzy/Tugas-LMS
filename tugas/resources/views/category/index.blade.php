<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category
        </h2>
    </x-slot>


    <div class="py-12 bg-gray-100">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white rounded-xl shadow p-6">


                <div class="flex justify-between items-center mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Category List
                    </h1>


                    <button
                        onclick="document.getElementById('addCategory').classList.remove('hidden')"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">

                        + Add Category

                    </button>

                </div>



                <!-- Modal Add Category -->

                <div id="addCategory"
                    class="hidden mb-6 bg-gray-50 border rounded-xl p-5">


                    <h2 class="text-lg font-bold mb-4">
                        Add New Category
                    </h2>


                    <form action="{{ route('category.store') }}"
                        method="POST">

                        @csrf


                        <div class="flex gap-3">


                            <input type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Category name"
                                class="flex-1 rounded-lg border-gray-300">


                            <button
                                type="submit"
                                class="bg-green-600 text-white px-5 rounded-lg hover:bg-green-700">

                                Save

                            </button>



                            <button
                                type="button"
                                onclick="document.getElementById('addCategory').classList.add('hidden')"
                                class="bg-gray-500 text-white px-5 rounded-lg">

                                Cancel

                            </button>


                        </div>


                        @error('name')

                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>

                        @enderror


                    </form>


                </div>




                @if(session('success'))

                    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-5">

                        {{ session('success') }}

                    </div>

                @endif




                <!-- Table -->

                <div class="overflow-x-auto">

                    <table class="w-full">


                        <thead>

                            <tr class="bg-gray-100">

                                <th class="px-4 py-3 text-left">
                                    No
                                </th>

                                <th class="px-4 py-3 text-left">
                                    Name
                                </th>

                                <th class="px-4 py-3 text-center">
                                    Action
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach($categories as $category)

                            <tr class="border-b">


                                <td class="px-4 py-3">
                                    {{ $loop->iteration }}
                                </td>


                                <td class="px-4 py-3">
                                    {{ $category->name }}
                                </td>


                                <td class="px-4 py-3 text-center">


                                    <a href="{{ route('category.edit',$category->id) }}"
                                        class="bg-yellow-400 text-white px-3 py-1 rounded">

                                        Edit

                                    </a>



                                    <form action="{{ route('category.destroy',$category->id) }}"
                                        method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')


                                        <button
                                            onclick="return confirm('Hapus kategori?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">

                                            Delete

                                        </button>


                                    </form>


                                </td>


                            </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>


            </div>


        </div>


    </div>


</x-app-layout>