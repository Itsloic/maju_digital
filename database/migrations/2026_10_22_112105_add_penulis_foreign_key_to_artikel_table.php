<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $foreignKeyExists = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', DB::getDatabaseName())
            ->where('TABLE_NAME', 'artikel')
            ->where('COLUMN_NAME', 'penulis_id')
            ->where('REFERENCED_TABLE_NAME', 'users')
            ->where('REFERENCED_COLUMN_NAME', 'id')
            ->exists();

        if (! $foreignKeyExists) {
            Schema::table('artikel', function (Blueprint $table) {
                $table->foreign('penulis_id')
                    ->references('id')
                    ->on('users')
                    ->restrictOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropForeign(['penulis_id']);
        });
    }
};
