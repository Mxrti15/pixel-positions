<?php

// Se declara el espacio de nombres donde se encuentra la clase Factory para este modelo.
namespace Database\Factories;

// Se importa la clase Factory para poder extenderla y crear la fábrica de este modelo.
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 * 
 * Comentario que indica que esta clase extiende de una fábrica de modelos 'Tag'.
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     * Comentario que indica que esta función define el estado por defecto del modelo Tag y que retorna un array con los datos.
     */
    public function definition(): array
    {
        // Devuelve un arreglo con los datos que se usan para crear un nuevo objeto de tipo Tag.
        return [
            // Genera un nombre de etiqueta único y aleatorio usando fake()->unique()->word.
            'name' => fake()->unique()->word,
        ];
    }
}
