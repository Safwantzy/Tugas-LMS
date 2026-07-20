<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $fillable = [
        'category_id',
        'judul',
        'deskripsi',
        'thumbnail'
    ];

    protected $table = 'kursus';


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function peserta()
    {
        return $this->belongsToMany(
            User::class,
            'enrollments'
        );
    }
}