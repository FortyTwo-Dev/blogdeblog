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
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text("content", 1024);
            $table->string("image_path", 255);
            $table->uuid('talk_id')->require();
            $table->foreign("talk_id")->references('id')->on('talks')->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
};
