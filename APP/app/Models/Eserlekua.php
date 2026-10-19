<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eserlekua extends Model
{
    /** @use HasFactory<\Database\Factories\EserlekuaFactory> */
    use HasFactory;

    protected $fillable = [
        'aretoa_id',
        'ilara',
        'zenbakia',
    ];

    public function aretoa()
    {
        return $this->belongsTo(Aretoa::class);
    }

    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class);
    }
}
