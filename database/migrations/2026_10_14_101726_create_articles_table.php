<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel artikel.
     */
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('ringkasan');
            $table->text('isi');
            $table->string('kategori');
            $table->string('penulis');
            $table->string('gambar')->nullable();
            $table->dateTime('tanggal_publikasi');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel artikel.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};