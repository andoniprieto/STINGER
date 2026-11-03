<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aretoa extends Model
{
    /** @use HasFactory<\Database\Factories\AretoaFactory> */
    use HasFactory;

    protected $fillable = ['izena'];

    public function saioak()
    {
        return $this->hasMany(Saioa::class);
    }

    public function eserlekuak()
    {
        return $this->hasMany(Eserlekua::class);
    }
}
