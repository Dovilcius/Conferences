<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Masyviam priskyrimui leistini laukai
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role',
    ];

    /**
     * Savybės, kurios bus paslėptos serializacijoje
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Savybių tipai, kurie bus paversti
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Ryšys su konferencijomis per tarpinę lentelę.
     *
     * Tai leis pasiekti konferencijas, prie kurių vartotojas prisiregistravo
     */
    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'conference_user', 'user_id', 'conference_id');
    }
}
