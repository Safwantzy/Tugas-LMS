{{-- resources/views/peserta/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Peserta')

@section('content')
<div class="container py-4">

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <h3>Selamat Datang, {{ auth()->user()->name }} 👋</h3>
                    <p class="mb-0">
                        Tetap semangat belajar dan selesaikan semua tugas tepat waktu.
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- Statistik --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2>{{ $totalKelas }}</h2>
                    <p class="text-muted mb-0">Kelas Diikuti</p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2>{{ $materiSelesai }}</h2>
                    <p class="text-muted mb-0">Materi Selesai</p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2>{{ $tugasBelum }}</h2>
                    <p class="text-muted mb-0">Tugas Belum Dikerjakan</p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2>{{ $nilaiRata }}</h2>
                    <p class="text-muted mb-0">Rata-rata Nilai</p>
                </div>
            </div>
        </div>

    </div>


    <div class="row">


        {{-- Kelas --}}
<div class="col-lg-8">

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">
            <h5 class="mb-0">Kursus Saya</h5>
        </div>

        <div class="card-body">

            <div class="row">

                @forelse($kelas as $item)

                <div class="col-md-6 mb-3">

                    <div class="card h-100 border">

                        <div class="card-body">

                            <h5>
                                {{ $item->judul }}
                            </h5>

                            <p class="text-muted">
                                {{ $item->deskripsi }}
                            </p>


                            <a href="{{ route('kursus.show',$item->id) }}"
                               class="btn btn-primary btn-sm">
                                Masuk Kursus
                            </a>

                        </div>

                    </div>

                </div>


                @empty

                <div class="col-12">

                    <div class="alert alert-info">
                        Belum mengikuti kursus.
                    </div>

                </div>

                @endforelse


            </div>

        </div>

    </div>

            {{-- Tugas --}}
            <div class="card shadow-sm border-0">

                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        Tugas Terbaru
                    </h5>
                </div>


                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kelas</th>
                                <th>Deadline</th>
                                <th>Status</th>
                            </tr>
                        </thead>


                        <tbody>


                        @forelse($tugas as $item)

                        <tr>

                            <td>
                                {{ $item->judul }}
                            </td>


                            <td>
                                {{ $item->kelas->nama_kelas ?? '-' }}
                            </td>


                            <td>
                                {{ $item->deadline }}
                            </td>


                            <td>

                                @if($item->status == "Sudah")

                                    <span class="badge bg-success">
                                        Sudah
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Belum
                                    </span>

                                @endif

                            </td>


                        </tr>


                        @empty


                        <tr>

                            <td colspan="4" class="text-center">
                                Tidak ada tugas.
                            </td>

                        </tr>


                        @endforelse


                        </tbody>

                    </table>


                </div>

            </div>


        </div>




        {{-- Sidebar --}}
        <div class="col-lg-4">


            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-white">
                    <h5>
                        Pengumuman
                    </h5>
                </div>


                <div class="card-body">


                    @forelse($pengumuman as $item)


                    <div class="mb-3">

                        <strong>
                            {{ $item->judul }}
                        </strong>


                        <p class="mb-1 text-muted">
                            {{ $item->isi }}
                        </p>


                        <small>
                            {{ $item->created_at->format('d M Y') }}
                        </small>


                    </div>


                    <hr>


                    @empty


                    <p>
                        Tidak ada pengumuman.
                    </p>


                    @endforelse


                </div>

            </div>



            <div class="card shadow-sm border-0">


                <div class="card-header bg-white">

                    <h5>
                        Profil Peserta
                    </h5>

                </div>



                <div class="card-body text-center">


                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                         class="rounded-circle mb-3">



                    <h5>
                        {{ auth()->user()->name }}
                    </h5>



                    <p class="text-muted">
                        {{ auth()->user()->email }}
                    </p>


                </div>


            </div>


        </div>


    </div>


</div>
@endsection