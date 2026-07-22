<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | ADMIN - DAFTAR KURSUS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Kursus::query();


        if ($request->filled('search')) {

            $query->where(
                'judul',
                'like',
                '%' . $request->search . '%'
            );

        }


        if ($request->filled('kategori')) {

            $query->where(
                'kategori',
                $request->kategori
            );

        }


        $kursus = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        $kategori = Kursus::select('kategori')
            ->distinct()
            ->pluck('kategori');


        return view(
            'admin.kursus.index',
            compact(
                'kursus',
                'kategori'
            )
        );
    }



    /*
    |--------------------------------------------------------------------------
    | PESERTA - KATALOG KURSUS
    |--------------------------------------------------------------------------
    */

    public function catalog(Request $request)
    {
        $query = Kursus::query();


        if ($request->filled('search')) {

            $query->where(
                'judul',
                'like',
                '%' . $request->search . '%'
            );

        }


        if ($request->filled('kategori')) {

            $query->where(
                'kategori',
                $request->kategori
            );

        }


        $kursus = $query
            ->latest()
            ->paginate(9)
            ->withQueryString();


        $kategori = Kursus::select('kategori')
            ->distinct()
            ->pluck('kategori');


        return view(
            'kursus.catalog',
            compact(
                'kursus',
                'kategori'
            )
        );
    }



    /*
    |--------------------------------------------------------------------------
    | ADMIN CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.kursus.create');
    }



    /*
    |--------------------------------------------------------------------------
    | ADMIN SIMPAN KURSUS
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        $request->validate([

            'judul' => 'required',

            'deskripsi' => 'required',

            'kategori' => 'required',

            'thumbnail' => 'nullable|image|max:2048',

        ]);



        $thumbnail = null;


        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request
                ->file('thumbnail')
                ->store('thumbnail','public');

        }



        Kursus::create([

            'judul' => $request->judul,

            'deskripsi' => $request->deskripsi,

            'kategori' => $request->kategori,

            'thumbnail' => $thumbnail,

        ]);



        return redirect()

            ->route('admin.kursus.index')

            ->with(
                'success',
                'Kursus berhasil ditambahkan'
            );

    }




    /*
    |--------------------------------------------------------------------------
    | DETAIL KURSUS
    |--------------------------------------------------------------------------
    */

    public function show(Kursus $kursus)
    {
        return view(
            'kursus.show',
            compact('kursus')
        );
    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Kursus $kursus)
    {
        return view(
            'admin.kursus.edit',
            compact('kursus')
        );
    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Kursus $kursus)
    {

        $request->validate([

            'judul' => 'required',

            'deskripsi' => 'required',

            'kategori' => 'required',

            'thumbnail' => 'nullable|image|max:2048',

        ]);



        $thumbnail = $kursus->thumbnail;



        if ($request->hasFile('thumbnail')) {


            if ($thumbnail) {

                Storage::disk('public')
                    ->delete($thumbnail);

            }



            $thumbnail = $request
                ->file('thumbnail')
                ->store('thumbnail','public');

        }




        $kursus->update([

            'judul' => $request->judul,

            'deskripsi' => $request->deskripsi,

            'kategori' => $request->kategori,

            'thumbnail' => $thumbnail,

        ]);




        return redirect()

            ->route('admin.kursus.index')

            ->with(
                'success',
                'Kursus berhasil diperbarui'
            );

    }





    /*
    |--------------------------------------------------------------------------
    | PESERTA ENROLL
    |--------------------------------------------------------------------------
    */

    public function enroll(Kursus $kursus)
    {

        auth()->user()
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





    /*
    |--------------------------------------------------------------------------
    | ADMIN DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(Kursus $kursus)
    {


        if ($kursus->thumbnail) {

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