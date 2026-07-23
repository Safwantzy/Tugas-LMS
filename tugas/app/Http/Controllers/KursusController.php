<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{


    /**
     * Filter kursus
     */
    private function filterKursus(Request $request)
    {
        return Kursus::query()

            ->when($request->filled('search'), function ($query) use ($request) {

                $query->where(
                    'judul',
                    'like',
                    '%' . $request->search . '%'
                );

            })

            ->when($request->filled('kategori'), function ($query) use ($request) {

                $query->where(
                    'kategori',
                    $request->kategori
                );

            });
    }





    /**
     * ADMIN LIST
     */
    public function index(Request $request)
    {

        $kursus = $this->filterKursus($request)

            ->latest()

            ->paginate(10)

            ->withQueryString();



        $kategori = Kursus::select('kategori')

            ->distinct()

            ->orderBy('kategori')

            ->pluck('kategori');



        return view(
            'admin.kursus.index',
            compact(
                'kursus',
                'kategori'
            )
        );

    }





    /**
     * PESERTA KATALOG
     */
    public function catalog(Request $request)
    {

        $kursus = $this->filterKursus($request)

            ->latest()

            ->paginate(9)

            ->withQueryString();



        $kategori = Kursus::select('kategori')

            ->distinct()

            ->orderBy('kategori')

            ->pluck('kategori');



        return view(
            'kursus.catalog',
            compact(
                'kursus',
                'kategori'
            )
        );

    }





    /**
     * CREATE
     */
    public function create()
    {
        return view('admin.kursus.create');
    }





    /**
     * STORE
     */
    public function store(Request $request)
    {

        $data = $request->validate([

            'judul' =>
            'required|string|max:255',

            'deskripsi' =>
            'required|string',

            'kategori' =>
            'required|string|max:100',

            'thumbnail' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);



        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');


            if ($file->isValid()) {

                $data['thumbnail'] =
                    $file->store(
                        'thumbnail',
                        'public'
                    );

            }

        }



        Kursus::create($data);



        return redirect()

            ->route('admin.kursus.index')

            ->with(
                'success',
                'Kursus berhasil ditambahkan'
            );

    }





    /**
     * SHOW
     */
    public function show(Kursus $kursus)
    {

        $kursus->load('users');


        return view(
            'kursus.show',
            compact('kursus')
        );

    }





    /**
     * EDIT
     */
    public function edit(Kursus $kursus)
    {

        return view(
            'admin.kursus.edit',
            compact('kursus')
        );

    }





    /**
     * UPDATE
     */
    public function update(Request $request, Kursus $kursus)
    {

        $data = $request->validate([

            'judul' =>
            'required|string|max:255',

            'deskripsi' =>
            'required|string',

            'kategori' =>
            'required|string|max:100',

            'thumbnail' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);



        /*
        Update thumbnail jika ada upload baru
        */

        if ($request->hasFile('thumbnail')) {


            $file = $request->file('thumbnail');


            if ($file->isValid()) {



                // hapus gambar lama

                if (
                    !empty($kursus->thumbnail) &&
                    Storage::disk('public')
                        ->exists($kursus->thumbnail)
                ) {

                    Storage::disk('public')
                        ->delete($kursus->thumbnail);

                }



                // simpan gambar baru

                $data['thumbnail'] =
                    $file->store(
                        'thumbnail',
                        'public'
                    );

            }

        }



        $kursus->update($data);



        return redirect()

            ->route('admin.kursus.index')

            ->with(
                'success',
                'Kursus berhasil diperbarui'
            );

    }





    /**
     * ENROLL PESERTA
     */
    public function enroll(Kursus $kursus)
    {

        auth()
            ->user()
            ->kursus()
            ->syncWithoutDetaching([
                $kursus->id
            ]);



        return back()

            ->with(
                'success',
                'Berhasil mengikuti kursus'
            );

    }





    /**
     * DELETE
     */
    public function destroy(Kursus $kursus)
    {

        if (
            !empty($kursus->thumbnail) &&
            Storage::disk('public')
                ->exists($kursus->thumbnail)
        ) {

            Storage::disk('public')
                ->delete($kursus->thumbnail);

        }



        $kursus->delete();



        return redirect()

            ->route('admin.kursus.index')

            ->with(
                'success',
                'Kursus berhasil dihapus'
            );

    }


}