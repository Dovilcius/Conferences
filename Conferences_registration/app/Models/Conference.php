<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    // Nurodykite laukus, kuriuos norite užpildyti iš formos
    protected $fillable = [
        'name',
        'date',
        'time',
        'description',
        'address',
        'lecturers',
    ];

    // Sukuriame santykį su vartotojais (many-to-many)
    public function participants()
    {
        return $this->belongsToMany(User::class, 'conference_user', 'conference_id', 'user_id')
                    ->withTimestamps(); // pridėkite laiką žymėms (timestaps) jei reikia
    }
}
