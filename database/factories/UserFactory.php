<?php

// Se declara el espacio de nombres donde se encuentra la clase Factory para este modelo.
namespace Database\Factories;

// Se importa la clase Factory para poder extenderla y crear la fábrica de este modelo.
use Illuminate\Database\Eloquent\Factories\Factory;

// Se importa la clase Hash para poder utilizarla en el proceso de encriptación de contraseñas.
use Illuminate\Support\Facades\Hash;

// Se importa la clase Str para generar cadenas aleatorias, en este caso para el token de "remember".
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 * 
 * Comentario que indica que esta clase extiende de una fábrica de modelos 'User'.
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     * 
     * Declaración de una propiedad estática opcional `$password` para guardar la contraseña usada por la fábrica.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * Comentario que indica que esta función define el estado por defecto del modelo User y que retorna un array con los datos.
     */
    public function definition(): array
    {
        // Devuelve un arreglo con los datos predeterminados que se usan para crear un nuevo objeto de tipo User.
        return [
            // Se genera un nombre aleatorio usando fake()->name().
            'name' => fake()->name(),
            
            // Se genera un correo electrónico único y seguro usando fake()->unique()->safeEmail().
            'email' => fake()->unique()->safeEmail(),
            
            // Se establece la fecha actual como la fecha de verificación del correo electrónico.
            'email_verified_at' => now(),
            
            // Si no se ha asignado una contraseña previamente, se asigna una contraseña por defecto encriptada usando Hash::make().
            'password' => static::$password ??= Hash::make('password'),
            
            // Se genera un token aleatorio de 10 caracteres para la función de "remember me".
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     * 
     * Función para indicar que la dirección de correo electrónico del modelo no está verificada.
     */
    public function unverified(): static
    {
        // Devuelve el estado del modelo con la fecha de verificación de correo electrónico establecida a null.
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
