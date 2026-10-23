<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable()->after('kategori');
            $table->unsignedBigInteger('penulis_id')->nullable()->after('penulis');
            $table->foreign('kategori_id')->references('id')->on('categories')->restrictOnDelete();
            $table->foreign('penulis_id')->references('id')->on('users')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropForeign(['penulis_id']);
            $table->dropColumn(['kategori_id', 'penulis_id']);
        });
    }
};
