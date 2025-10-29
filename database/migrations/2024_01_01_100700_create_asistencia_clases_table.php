<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asistencia_clases', function (Blueprint $table) {
            $table->id('id_asistencia');
            $table->foreignId('id_inscripcion')->constrained('inscripciones_clases', 'id_inscripcion')->cascadeOnDelete();
            $table->dateTime('fecha_entrada');
            $table->dateTime('fecha_salida')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asistencia_clases');
    }
};