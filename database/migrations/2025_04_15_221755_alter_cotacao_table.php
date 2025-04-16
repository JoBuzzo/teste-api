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
        Schema::table('cotacao', function (Blueprint $table) {
            $table->bigIncrements('id_cotacao')->primary()->change();

            $table->unsignedBigInteger('id_usuario')->change();
            $table->foreign('id_usuario')->references('id')->on('usuarios');

            $table->unsignedBigInteger('id_servico')->change();
            $table->foreign('id_servico')->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cotacao', function (Blueprint $table) {
            //
        });
    }
};
