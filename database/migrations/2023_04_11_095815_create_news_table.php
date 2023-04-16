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
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('content');
            $table->unsignedInteger('blog_categories_id');
            $table->string('tags');
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->string('status')->nullable();
            $table->string('lang')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
