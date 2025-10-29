<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membresia extends Model
{
    use HasFactory;

    protected $table = 'membresias';

    protected $primaryKey = 'id_membresia';

    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_tipo_membresia',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function tipoMembresia(): BelongsTo
    {
        return $this->belongsTo(TipoMembresia::class, 'id_tipo_membresia', 'id_tipo_membresia');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'id_membresia', 'id_membresia');
    }
}