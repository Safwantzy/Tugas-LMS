<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Thumbnail</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kursus as $item)
        <td>
    <a href="{{ route('kursus.show', $item->id) }}">
        Detail
    </a>
</td>
        <tr>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->kategori }}</td>
            <td>
                @if($item->thumbnail)
                    <img src="{{ asset('storage/'.$item->thumbnail) }}" width="150">
                @else
                    Tidak ada thumbnail
                @endif
            </td>
            <th>Aksi</th>
        </tr>
        @endforeach
    </tbody>
</table>