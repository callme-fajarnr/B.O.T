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
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('tittle');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('video')->nullable();
            $table->string('link')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->string('videoeditby')->nullable();
            $table->string('igvideo')->nullable();
            $table->string('photoby')->nullable();
            $table->string('igphoto')->nullable();
            $table->string('aktor1')->nullable();
            $table->string('igaktor1')->nullable();
            $table->string('aktor2')->nullable();
            $table->string('igaktor2')->nullable();
            $table->string('aktor3')->nullable();
            $table->string('igaktor3')->nullable();
            $table->timestamp('published_at')->nullable();
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
