<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;


    protected $table = 'kursus';


    protected $fillable = [

        'judul',
        'deskripsi',
        'kategori',
        'thumbnail',

    ];



    public function enrollments()
    {
        return $this->hasMany(
            Enrollment::class,
            'kursus_id'
        );
    }



    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'enrollments',
            'kursus_id',
            'user_id'
        );
    }
}