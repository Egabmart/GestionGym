<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use App\Models\TipoMembresia;
use App\Models\Membresia;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    // --- CLASES ---
    
    // Obtener todas las clases (Para el calendario/lista)
    public function indexClases()
    {
        return response()->json(Clase::all());
    }

    // Crear una clase (RF8 - Entrenadores)
    public function storeClase(Request $request)
    {
        $request->validate([
            'nombre_clase' => 'required',
            'horario' => 'required|date',
            'capacidad_maxima' => 'required|integer'
        ]);

        $clase = Clase::create($request->all());
        return response()->json($clase, 201);
    }

    // --- MEMBRESÍAS ---

    // Obtener tipos de membresía (Para que el usuario elija)
    public function indexTiposMembresia()
    {
        return response()->json(TipoMembresia::all());
    }

    // Comprar/Registrar membresía (RF12)
    public function storeMembresia(Request $request)
    {
        $usuario = Auth::user(); // Usuario logueado
        
        // Aquí iría la lógica de cálculo de fechas
        $tipo = TipoMembresia::findOrFail($request->id_tipo_membresia);
        
        $membresia = Membresia::create([
            'id_usuario' => $usuario->id,
            'id_tipo_membresia' => $tipo->id_tipo_membresia,
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addDays($tipo->duracion_dias),
            'estado' => 'Activa'
        ]);

        return response()->json(['message' => 'Membresía creada', 'data' => $membresia]);
    }
}