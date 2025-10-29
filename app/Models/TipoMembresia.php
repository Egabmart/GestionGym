<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoMembresia extends Model
{
    use HasFactory;

    protected $table = 'tipos_membresia';

    protected $primaryKey = 'id_tipo_membresia';

    public $timestamps = false;

    protected $fillable = [
        'nombre_membresia',
        'duracion_dias',
        'precio',
    ];

    protected $casts = [
        'duracion_dias' => 'integer',
        'precio' => 'decimal:2',
    ];

    public function membresias(): HasMany
    {
        return $this->hasMany(Membresia::class, 'id_tipo_membresia', 'id_tipo_membresia');
    }
}