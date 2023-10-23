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
            $table->unsignedBigInteger('eixo_foco_id')->nullable();
            $table->unsignedBigInteger('eixo_julgamento_id')->nullable();
            $table->unsignedBigInteger('eixo_acao_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('eixo_foco_id')->references('id')->on('eixos');
            $table->foreign('eixo_julgamento_id')->references('id')->on('eixos');
            $table->foreign('eixo_acao_id')->references('id')->on('eixos');
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
