<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function create()
    {
        // Retorna la vista de inicio de sesión
        return view('auth.login');
    }

    /**
     * Maneja el inicio de sesión del usuario.
     */
    public function store()
    {
        // Valida las credenciales ingresadas
        $attributes = request()->validate([
            'email' => ['required', 'email'], // El correo es obligatorio y debe ser válido
            'password' => ['required'], // La contraseña es obligatoria
        ]);

        // Intenta autenticar al usuario con las credenciales proporcionadas
        if (! Auth::attempt($attributes)) {
            // Si la autenticación falla, lanza una excepción con un mensaje de error
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }

        // Regenera la sesión para evitar ataques de fijación de sesión
        request()->session()->regenerate();

        // Redirige a la página principal después del inicio de sesión exitoso
        return redirect('/');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function destroy()
    {
        // Cierra la sesión del usuario autenticado
        Auth::logout();

        // Redirige a la página principal después de cerrar sesión
        return redirect('/');
    }
}
