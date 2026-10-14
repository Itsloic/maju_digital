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
    Schema::create('complaints', function (Blueprint $table) {
        $table->id();

        $table->string('complaint_number')->unique();

        $table->foreignId('complaint_category_id')
            ->constrained('complaint_categories')
            ->restrictOnDelete();

        $table->foreignId('user_id')
            ->constrained('users')
            ->restrictOnDelete();

        $table->foreignId('assigned_to')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->string('title');
        $table->longText('description');
        $table->string('location')->nullable();
        $table->string('attachment_path')->nullable();

        $table->string('status', 30)->default('submitted');
        $table->timestamp('verified_at')->nullable();
        $table->timestamp('resolved_at')->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('complaints');
}

};
