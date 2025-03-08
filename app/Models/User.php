<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben estar ocultos en la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Obtiene los atributos que deben ser casteados a otro tipo de datos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convierte el campo en una instancia de fecha y hora
            'password' => 'hashed', // Aplica hashing a la contraseña
        ];
    }

    /**
     * Relación: Un usuario puede tener un empleador asociado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relación con el modelo Employer.
     */
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }
}
