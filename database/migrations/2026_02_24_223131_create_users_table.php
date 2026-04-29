<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->foreignId('location_type_id')->nullable()->constrained('location_types')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('locations')->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('location_types', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->string('name')->nullable();
            $table->string('password');
            $table->foreignId('location_id')->nullable()->constrained()->nullOnDelete()->change();
            $table->string('image')->nullable();
          //  $table->foreignId('role_id')->constrained()->cascadeOnDelete()->nullable()->change();
            $table->string('user_name', 50)->unique()->nullable();
            $table->string('full_name', 100)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone', 50)->nullable();
            $table->text('bio')->nullable();
            $table->boolean('is_verified')->default(false)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
