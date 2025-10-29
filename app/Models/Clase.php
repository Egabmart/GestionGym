<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clases';

    protected $primaryKey = 'id_clase';

    public $timestamps = false;

    protected $fillable = [
        'nombre_clase',
        'id_entrenador',
        'horario',
        'capacidad_maxima',
    ];

    protected $casts = [
        'horario' => 'datetime',
        'capacidad_maxima' => 'integer',
    ];

    public function entrenador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_entrenador', 'id_usuario');
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(InscripcionClase::class, 'id_clase', 'id_clase');
    }
}