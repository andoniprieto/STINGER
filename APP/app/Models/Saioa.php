<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saioa extends Model
{
    /** @use HasFactory<\Database\Factories\SaioaFactory> */
    use HasFactory;

    protected $fillable = [
        'aretoa_id',
        'ekitaldia_id',
        'data',
        'ordua',
    ];

    protected function casts(): array
    {
        return ['data' => 'date'];
    }

    public function aretoa()
    {
        return $this->belongsTo(Aretoa::class);
    }

    public function ekitaldia()
    {
        return $this->belongsTo(Ekitaldia::class);
    }

    public function sarrerak()
    {
        return $this->hasMany(Sarrera::class);
    }
}
