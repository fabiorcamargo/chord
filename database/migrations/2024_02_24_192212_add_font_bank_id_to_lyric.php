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
        Schema::table('lyrics', function (Blueprint $table) {
            $table->foreignId('font_bank_id')->nullable()->constrained('font_banks', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lyrics', function (Blueprint $table) {
            $table->dropForeign(['font_bank_id']);
            $table->dropColumn('font_bank_id');
        });
    }
};
