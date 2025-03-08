<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Fábrica para generar instancias del modelo Employer con datos aleatorios.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed> Datos generados para el modelo Employer.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(), // Genera un nombre de empresa aleatorio
            'logo' => fake()->imageUrl(), // Genera una URL aleatoria para la imagen del logo
            'user_id' => User::factory(), // Asigna un usuario generado por la fábrica de usuarios
        ];
    }
}
