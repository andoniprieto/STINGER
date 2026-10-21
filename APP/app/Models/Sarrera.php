<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarrera extends Model
{
    /** @use HasFactory<\Database\Factories\SarreraFactory> */
    use HasFactory;

    protected $fillable = [
        'erabiltzailea_id',
        'eserlekua_id',
        'saioa_id',
        'prezioa',
        'erosketa_data',
        'egoera',
    ];

    protected function casts(): array
    {
        return [
            'prezioa' => 'decimal:2',
            'erosketa_data' => 'date',
        ];
    }

    public function erabiltzailea()
    {
        return $this->belongsTo(User::class, 'erabiltzailea_id');
    }

    public function eserlekua()
    {
        return $this->belongsTo(Eserlekua::class);
    }

    public function saioa()
    {
        return $this->belongsTo(Saioa::class);
    }
}
