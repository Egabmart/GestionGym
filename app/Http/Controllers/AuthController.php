<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Login compatible con authService.ts del frontend
    public function login(Request $request)
    {
        // Validar
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticar
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        
        // Limpieza de tokens viejos (opcional)
        $user->tokens()->delete();

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Respuesta JSON exacta que espera authService.ts: { token, usuario }
        return response()->json([
            'token' => $token,
            'usuario' => $user,
        ]);
    }

    // Endpoint /me
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    // Endpoint /logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}