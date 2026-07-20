<form action="{{ route('kursus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul</label>
    <input type="text" name="judul">

    <label>Deskripsi</label>
    <textarea name="deskripsi"></textarea>

    <label>Kategori</label>
    <input type="text" name="kategori">

    <label>Thumbnail</label>
    <input type="file" name="thumbnail">

    <button type="submit">
        Simpan Kursus
    </button>
</form>