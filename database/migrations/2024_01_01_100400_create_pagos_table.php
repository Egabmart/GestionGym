<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->foreignId('id_membresia')->constrained('membresias', 'id_membresia')->cascadeOnDelete();
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha_pago')->useCurrent();
            $table->string('metodo_pago', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};