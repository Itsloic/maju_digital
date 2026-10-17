<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('id_artikel')->constrained('categories');
            $table->foreignId('user_id')->after('category_id')->constrained('users');
            $table->boolean('is_featured')->default(false)->after('tanggal_publikasi');
            $table->string('status', 20)->default('draft')->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['category_id', 'user_id', 'is_featured', 'status']);
        });
    }
};
