<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminsController extends Controller
{
    public function index()
    {
        $admins=Admins::all();
        return $admins;
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        $admins = Admins::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['admins' => $admins], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        info('Credenciales:', $credentials);
      
        if (Auth::attempt($credentials)) 
        {
            info("hola");
        // Autenticación exitosa
            return response()->json(['message' => 'Autenticación exitosa'], 200);
        } else {
        // Autenticación fallida
            return response()->json(['message' => 'Credenciales no válidas'], 401);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout exitoso'], 200);
    }
}