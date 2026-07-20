<h1>Add Category</h1>

<form action="{{ route('category.store') }}" method="POST">

@csrf

<input type="text" name="name" placeholder="Category name">

<button type="submit">
Save
</button>

</form>