<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    // Login compatible con authService.ts del frontend
    public function login(Request $request)
    {
        // Validar
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticar
        if (!Auth::attempt($credentials)) {
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

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'id_rol' => 'nullable|exists:roles,id_rol',
        ]);

        $defaultRoleId = $data['id_rol'] ?? Role::where('nombre_rol', 'Miembro')->value('id_rol');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'id_rol' => $defaultRoleId,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'usuario' => $user,
        ], 201);
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