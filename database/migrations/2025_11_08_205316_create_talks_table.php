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
        Schema::create('talks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("slug", 255)->unique();
            $table->string("title", 255);
            $table->string("description", 255);
            $table->text("content");
            $table->string("image_path", 255);
            $table->uuid('blog_id')->require();
            $table->foreign("blog_id")->references('id')->on('blogs')->onDelete('cascade');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talks');
    }
};
