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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('status_id')->constrained('statuses')->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->integer('required_amount')->nullable();
            $table->integer('total_amount')->default(0)->nullable();
            $table->string('image')->nullable();
            $table->integer('shared_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->integer('saved_count')->default(0);
            $table->integer('views_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
