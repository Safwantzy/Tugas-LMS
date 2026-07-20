<h1>{{ $kursus->judul }}</h1>

<p>{{ $kursus->deskripsi }}</p>

<p>Kategori: {{ $kursus->kategori }}</p>


<form action="{{ route('kursus.enroll', $kursus->id) }}" method="POST">
    @csrf

    <button type="submit">
        Ikuti Kursus
    </button>
</form>


<h2>Peserta yang mengikuti:</h2>

@foreach($kursus->peserta as $peserta)

    <p>
        {{ $peserta->name }}
    </p>

@endforeach