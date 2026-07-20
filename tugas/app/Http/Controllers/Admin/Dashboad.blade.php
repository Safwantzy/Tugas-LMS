<a href="{{ route('category.index') }}">
    <button type="button"
        style="
            background-color: #2563eb;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        ">
        Category
    </button>
</a>
<a href="{{ route('enrollment.index') }}">
    Kelola Enrollment
</a>
<!-- Enrollment -->
<div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

    <div class="flex items-center mb-4">

        <div class="bg-purple-100 p-3 rounded-full">
            📝
        </div>

        <h3 class="ml-4 text-xl font-bold text-gray-800">
            Enrollment
        </h3>

    </div>


    <p class="text-gray-600 mb-5">
        Kelola peserta yang mengikuti kursus.
    </p>


    <a href="{{ route('enrollment.index') }}"
       class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg">

        Kelola Enrollment

    </a>

</div>