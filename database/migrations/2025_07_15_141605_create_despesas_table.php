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
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->comment('Descrição da despesa');
            $table->decimal('valor', 10, 2)->comment('Valor da despesa');
            $table->date('data')->comment('Data da despesa');
            $table->string('paga')->default("Não")->comment('Indica se a despesa foi paga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
