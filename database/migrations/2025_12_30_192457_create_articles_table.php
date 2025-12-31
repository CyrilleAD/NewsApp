<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255)->unique();
            $table->string('slug', 600)->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('isActive')->default(true);
            $table->boolean('isCommentable')->default(true);
            $table->boolean('isShareable')->default(true);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('author_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
