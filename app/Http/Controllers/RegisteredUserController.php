<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Muestra el formulario de registro de un nuevo usuario.
     */
    public function create()
    {
        // Retorna la vista del formulario de registro
        return view('auth.register');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param Request $request Datos del formulario de registro.
     */
    public function store(Request $request)
    {
        // Valida los datos del usuario ingresados en el formulario
        $userAttributes = $request->validate([
            'name' => ['required'], // El nombre del usuario es obligatorio
            'email' => ['required', 'email', 'unique:users,email'], // El correo debe ser único y válido
            'password' => ['required', 'confirmed', Password::min(6)], // La contraseña debe tener al menos 6 caracteres y coincidir con la confirmación
        ]);

        // Valida los datos del empleador asociados al usuario
        $employerAttributes = $request->validate([
            'employer' => ['required'], // El nombre del empleador es obligatorio
            'logo' => ['required', File::types(['png', 'jpg', 'webp'])], // El logo debe ser un archivo PNG, JPG o WEBP
        ]);

        // Crea el usuario con los atributos validados
        $user = User::create($userAttributes);

        // Almacena el logo en la carpeta 'logos' dentro del almacenamiento
        $logoPath = $request->logo->store('logos');

        // Crea el empleador asociado al usuario con el nombre y el logo almacenado
        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath,
        ]);

        // Autentica al usuario recién registrado
        Auth::login($user);

        // Redirige a la página principal después del registro
        return redirect('/');
    }
}
