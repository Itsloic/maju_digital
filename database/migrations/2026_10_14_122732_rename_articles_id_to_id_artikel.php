<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        // Lepaskan foreign key komentar untuk sementara.
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });

        // Ubah nama primary key tanpa menghapus data artikel.
        DB::statement(
            'ALTER TABLE articles
             CHANGE id id_artikel BIGINT UNSIGNED NOT NULL AUTO_INCREMENT'
        );

        // Hubungkan kembali komentar ke primary key baru.
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('article_id')
                ->references('id_artikel')
                ->on('articles')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });

        DB::statement(
            'ALTER TABLE articles
             CHANGE id_artikel id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT'
        );

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->cascadeOnDelete();
        });
    }
};