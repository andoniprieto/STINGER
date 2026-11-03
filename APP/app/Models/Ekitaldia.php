<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
    /** @use HasFactory<\Database\Factories\EkitaldiaFactory> */
    use HasFactory;

    protected $fillable = ['izenburua', 'deskribapena', 'prezioa'];

    protected function casts(): array
    {
        return ['prezioa' => 'decimal:2'];
    }

    public function kategoriak()
    {
        return $this->belongsToMany(
            Kategoria::class,
            'ekitaldia_kategoria'
        );
    }

    public function saioak()
    {
        return $this->hasMany(Saioa::class);
    }
}
