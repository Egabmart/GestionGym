<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GymController;

// Ruta pública para login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas (requieren Token)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Gimnasio - Clases
    Route::get('/clases', [GymController::class, 'indexClases']); // Ver clases
    Route::post('/clases', [GymController::class, 'storeClase']); // Crear clase

    // Gimnasio - Membresías
    Route::get('/tipos-membresia', [GymController::class, 'indexTiposMembresia']); // Ver precios
    Route::post('/membresias', [GymController::class, 'storeMembresia']); // Comprar
});