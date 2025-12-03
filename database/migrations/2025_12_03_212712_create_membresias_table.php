<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id('id_membresia');
            // Relación con el Usuario
            $table->foreignId('id_usuario')->constrained('users')->cascadeOnDelete();
            
            // Relación con el Tipo de Membresía (Aquí estaba el truco, debe coincidir con la otra tabla)
            $table->foreignId('id_tipo_membresia')->constrained('tipos_membresia', 'id_tipo_membresia');
            
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->enum('estado', ['Activa', 'Vencida', 'Pendiente'])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};