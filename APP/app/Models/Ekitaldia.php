<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
    /** @use HasFactory<\Database\Factories\EkitaldiaFactory> */
    use HasFactory;

    protected $table = 'ekitaldiak';
    
    protected $fillable = [
        'izenburua',
        'deskribapena',
        'kategoria',
        'data',
        'ordua',
        'prezioa'
    ];

    protected function casts(): array
    {
        return [
            'data' => 'date',
            'ordua' => 'datetime',
            'prezioa' => 'decimal:2'
        ];
    }

    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class);
    }
}
