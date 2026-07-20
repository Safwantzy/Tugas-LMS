<h2>Edit Kursus</h2>


<form action="{{route('kursus.update',$kursus->id)}}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')


Judul

<input type="text"
name="judul"
value="{{$kursus->judul}}"
class="form-control">


Deskripsi

<textarea name="deskripsi"
class="form-control">
{{$kursus->deskripsi}}
</textarea>


Kategori

<input type="text"
name="kategori"
value="{{$kursus->kategori}}"
class="form-control">


Thumbnail Baru

<input type="file"
name="thumbnail"
class="form-control">


@if($kursus->thumbnail)

<img src="{{asset('storage/'.$kursus->thumbnail)}}"
width="120">

@endif


<br>

<button class="btn btn-primary">
Update
</button>


</form>