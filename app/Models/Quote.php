<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'hora',
    ];

    // Relación ---
    public function services()
    {
        // Un Álbum tiene muchas canciones
        return $this->hasMany(Service::class);
    }
}
