<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('verses', function (Blueprint $table) {
            $table->string('status')->nullable()->after('text'); // Adiciona a coluna 'status' após a coluna 'text'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('verses', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove a coluna 'status' se a migração for revertida
        });
    }
};
