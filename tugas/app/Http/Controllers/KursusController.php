<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{

    public function index()
    {
        $kursus = Kursus::latest()->get();

        return view('kursus.index', compact('kursus'));
    }


    public function create()
    {
        return view('kursus.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'thumbnail' => 'nullable|image|max:2048'
        ]);


        $thumbnail = null;


        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('thumbnail', 'public');

        }


        Kursus::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'thumbnail' => $thumbnail
        ]);


        return redirect()
            ->route('kursus.index')
            ->with('success', 'Kursus berhasil ditambahkan');
    }



    public function show(Kursus $kursus)
    {
        $kursus->load('peserta');

        return view('kursus.show', compact('kursus'));
    }



    public function enroll(Kursus $kursus)
    {
        auth()->user()
            ->kursus()
            ->syncWithoutDetaching([
                $kursus->id
            ]);


        return redirect()
            ->back()
            ->with('success', 'Berhasil mengikuti kursus');
    }



    public function destroy(Kursus $kursus)
    {

        if ($kursus->thumbnail) {

            Storage::disk('public')
                ->delete($kursus->thumbnail);

        }


        $kursus->delete();


        return redirect()
            ->route('kursus.index')
            ->with('success', 'Kursus berhasil dihapus');
    }

}
