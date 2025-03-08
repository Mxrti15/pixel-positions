<?php

// Se declara el espacio de nombres donde se encuentra la clase Factory para este modelo.
namespace Database\Factories;

// Se importa el modelo Employer para poder usarlo dentro de la fábrica.
use App\Models\Employer;

// Se importa la clase Factory para poder extenderla y crear la fábrica de este modelo.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 * 
 * Comentario que indica que esta clase extiende de una fábrica de modelos 'Job'.
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * Comentario que indica que esta función define el estado por defecto del modelo Job y que retorna un array con los datos.
     */
    public function definition(): array
    {
        // Devuelve un arreglo con los datos que se usan para crear un nuevo objeto de tipo Job.
        return [
            // La relación con el modelo Employer se crea usando la fábrica de Employer.
            'employer_id' => Employer::factory(),
            
            // Se genera un título de trabajo de forma aleatoria usando la función fake()->jobTitle.
            'title' => fake()->jobTitle,
            
            // Se asigna un salario aleatorio de una lista predefinida usando fake()->randomElement().
            'salary' => fake()->randomElement(['$50,000 USD', '$90,000 USD', '$150,000 USD']),
            
            // La ubicación está fijada como 'Remote'.
            'location' => 'Remote',
            
            // El horario está fijado como 'Full Time'.
            'schedule' => 'Full Time',
            
            // Se genera una URL aleatoria para el trabajo usando fake()->url.
            'url' => fake()->url,
            
            // El trabajo no está marcado como destacado por defecto.
            'featured' => false,
        ];
    }
}
