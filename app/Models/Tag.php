<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * Relación: Una etiqueta puede estar asociada a muchos trabajos.
     *
     * @return BelongsToMany Relación con el modelo Job.
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }
}
