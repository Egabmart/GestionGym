<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsistenciaClase extends Model
{
    use HasFactory;

    protected $table = 'asistencia_clases';

    protected $primaryKey = 'id_asistencia';

    public $timestamps = false;

    protected $fillable = [
        'id_inscripcion',
        'fecha_entrada',
        'fecha_salida',
    ];

    protected $casts = [
        'fecha_entrada' => 'datetime',
        'fecha_salida' => 'datetime',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(InscripcionClase::class, 'id_inscripcion', 'id_inscripcion');
    }
}