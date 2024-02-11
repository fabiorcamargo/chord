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
        Schema::create('slide_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bible_image_background')->nullable()->constrained('image_banks', 'id');
            $table->foreignId('bible_video_background')->nullable()->constrained('video_banks', 'id');
            $table->string('type')->nullable();
            $table->string('bg_color')->nullable();
            $table->foreignId('bible_font')->nullable()->constrained('font_banks', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide_configs');
    }
};
