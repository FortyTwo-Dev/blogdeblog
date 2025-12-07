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
        Schema::create('blogs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("slug", 255)->unique();
            $table->string("title", 64);
            $table->string("description", 255);
            $table->string("image_path", 255);
            $table->string('theme', 42)->default('base');
            $table->unsignedBigInteger('user_id')->require();
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
