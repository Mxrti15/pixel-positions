<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    /**
     * Relación: Un empleador pertenece a un usuario.
     *
     * @return BelongsTo Relación con el modelo User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un empleador puede tener muchos trabajos.
     *
     * @return HasMany Relación con el modelo Job.
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
