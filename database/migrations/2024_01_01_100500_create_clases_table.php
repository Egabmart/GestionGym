<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id('id_clase');
            $table->string('nombre_clase', 100);
            $table->foreignId('id_entrenador')->nullable()->constrained('usuarios', 'id_usuario')->nullOnDelete();
            $table->dateTime('horario');
            $table->integer('capacidad_maxima');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
