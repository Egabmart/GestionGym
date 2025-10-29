<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones_clases', function (Blueprint $table) {
            $table->id('id_inscripcion');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->cascadeOnDelete();
            $table->foreignId('id_clase')->constrained('clases', 'id_clase')->cascadeOnDelete();
            $table->timestamp('fecha_inscripcion')->useCurrent();
            $table->unique(['id_usuario', 'id_clase']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones_clases');
    }
};
