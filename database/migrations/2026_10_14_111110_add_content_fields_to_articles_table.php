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
    Schema::table('articles', function (Blueprint $table) {
        $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->nullOnDelete();

        $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->string('title');
        $table->string('slug')->unique();
        $table->text('excerpt')->nullable();
        $table->longText('content');
        $table->string('image')->nullable();
        $table->string('status', 20)->default('draft');
        $table->boolean('is_featured')->default(false);
        $table->timestamp('published_at')->nullable();
    });
}

public function down(): void
{
    Schema::table('articles', function (Blueprint $table) {
        $table->dropForeign(['category_id']);
        $table->dropForeign(['user_id']);
        $table->dropUnique(['slug']);

        $table->dropColumn([
            'category_id',
            'user_id',
            'title',
            'slug',
            'excerpt',
            'content',
            'image',
            'status',
            'is_featured',
            'published_at',
        ]);
    });
}

};
