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
    Schema::create('comments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('article_id')
            ->constrained('articles')
            ->cascadeOnDelete();

        $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->text('content');
        $table->string('status', 20)->default('pending');
        $table->timestamp('approved_at')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('comments');
}

};
