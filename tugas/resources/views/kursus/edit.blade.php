<form action="{{ route('admin.kursus.update', ['kursu' => $kursus->id]) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    ...
    
</form>