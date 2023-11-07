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
        Schema::create('termos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('foco_id');
            $table->foreign('foco_id')->references('id')->on('eixos');
            $table->unsignedBigInteger('julgamento_id')->nullable();
            $table->foreign('julgamento_id')->references('id')->on('eixos');
            $table->unsignedBigInteger('acao_id')->nullable();
            $table->foreign('acao_id')->references('id')->on('eixos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termos');
    }
};
