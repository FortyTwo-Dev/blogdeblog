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
        Schema::create('tag_talk', function (Blueprint $table) {
            $table->uuid('tag_id')->require();
            $table->uuid('talk_id')->require();
            $table->foreign("tag_id")->references('id')->on('tags')->onDelete('cascade');
            $table->foreign("talk_id")->references('id')->on('talks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_talk');
    }
};
