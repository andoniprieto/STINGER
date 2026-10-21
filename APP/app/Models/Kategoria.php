<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriaFactory> */
    use HasFactory;

    protected $fillable = ['izena'];

    public function ekitaldiak()
    {
        return $this->belongsToMany(
            Ekitaldia::class,
            'ekitaldia_kategoria'
        );
    }
}
