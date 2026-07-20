<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
</head>
<body>

<h1>Category List</h1>

<a href="{{ route('category.create') }}">
    Add Category
</a>

<br><br>

<table border="1">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('category.edit', $category->id) }}">
                Edit
            </a>

            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>