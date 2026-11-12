<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $fillable = ['izena'];

    public function ekitaldiak()
    {
        return $this->hasMany(Ekitaldia::class);
    }
}
