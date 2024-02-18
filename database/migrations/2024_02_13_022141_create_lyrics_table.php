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
        Schema::create('lyrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('song_id')->nullable()->constrained('songs', 'id');
            $table->json('slide')->nullable();
            $table->json('slidetext')->nullable();
            $table->foreignId('image_background_id')->nullable()->constrained('image_banks', 'id');
            $table->foreignId('video_background_id')->nullable()->constrained('video_banks', 'id');
            $table->string('background_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lyrics');
    }
};
