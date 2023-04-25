<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Relación inversa
    public function quote()
    {
        // Una canción pertenece a un álbum
        return $this->belongsTo(Quote::class);
    }
}
