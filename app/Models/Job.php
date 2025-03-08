<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    /**
     * Agrega una etiqueta al trabajo, creándola si no existe.
     *
     * @param string $name Nombre de la etiqueta.
     */
    public function tag(string $name): void
    {
        // Busca o crea la etiqueta con el nombre proporcionado
        $tag = Tag::firstOrCreate(['name' => strtolower($name)]);

        // Asocia la etiqueta al trabajo actual
        $this->tags()->attach($tag);
    }

    /**
     * Relación: Un trabajo puede tener muchas etiquetas.
     *
     * @return BelongsToMany Relación con el modelo Tag.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Relación: Un trabajo pertenece a un empleador.
     *
     * @return BelongsTo Relación con el modelo Employer.
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}
