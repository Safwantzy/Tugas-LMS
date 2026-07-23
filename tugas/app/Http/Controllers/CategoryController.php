<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Menampilkan semua kategori
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view(
            'category.index',
            compact('categories')
        );
    }



    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('category.create');
    }




    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100'
            ],

        ]);



        Category::create($data);



        return redirect()

            ->route('category.index')

            ->with(
                'success',
                'Kategori berhasil ditambahkan.'
            );

    }




    /**
     * Detail kategori
     */
    public function show(Category $category)
    {
        return view(
            'category.show',
            compact('category')
        );
    }





    /**
     * Form edit kategori
     */
    public function edit(Category $category)
    {
        return view(
            'category.edit',
            compact('category')
        );
    }





    /**
     * Update kategori
     */
    public function update(Request $request, Category $category)
    {

        $data = $request->validate([

            'name' => [
                'required',
                'string',
                'max:100'
            ],

        ]);



        $category->update($data);



        return redirect()

            ->route('category.index')

            ->with(
                'success',
                'Kategori berhasil diperbarui.'
            );

    }





    /**
     * Hapus kategori
     */
    public function destroy(Category $category)
    {

        $category->delete();



        return redirect()

            ->route('category.index')

            ->with(
                'success',
                'Kategori berhasil dihapus.'
            );

    }

}