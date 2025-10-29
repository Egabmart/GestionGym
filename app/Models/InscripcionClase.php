<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InscripcionClase extends Model
{
    use HasFactory;

    protected $table = 'inscripciones_clases';

    protected $primaryKey = 'id_inscripcion';

    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_clase',
        'fecha_inscripcion',
    ];

    protected $casts = [
        'fecha_inscripcion' => 'datetime',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function clase(): BelongsTo
    {
        return $this->belongsTo(Clase::class, 'id_clase', 'id_clase');
    }

    public function asistencia(): HasOne
    {
        return $this->hasOne(AsistenciaClase::class, 'id_inscripcion', 'id_inscripcion');
    }
}