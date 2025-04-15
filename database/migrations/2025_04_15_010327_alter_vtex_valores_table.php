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
        Schema::table('vtex_valores', function (Blueprint $table) {
            $table->bigIncrements('id')->primary()->change();
            $table->foreignId('id_servico')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vtex_valores', function (Blueprint $table) {
            //
        });
    }
};
