<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 Schema::create('kursus', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->text('deskripsi');
    $table->string('kategori');
    $table->string('thumbnail')->nullable();
    $table->timestamps();
});

    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};