<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enrollment;

class Kursus extends Model
{
    protected $table = 'kursus';
protected $fillable = [
    'judul',
    'deskripsi',
    'kategori',
    'thumbnail',
];
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}