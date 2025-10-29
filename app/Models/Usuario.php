<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'fecha_registro',
        'id_rol',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_rol', 'id_rol');
    }

    public function membresias(): HasMany
    {
        return $this->hasMany(Membresia::class, 'id_usuario', 'id_usuario');
    }

    public function clasesEntrenador(): HasMany
    {
        return $this->hasMany(Clase::class, 'id_entrenador', 'id_usuario');
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(InscripcionClase::class, 'id_usuario', 'id_usuario');
    }
}