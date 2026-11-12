<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarrera extends Model
{
    /** @use HasFactory<\Database\Factories\SarreraFactory> */
    use HasFactory;

    protected $table = 'sarrerak';

    protected $fillable = [
        'user_id',
        'ekitaldia_id',
        'kopurua',
        'prezio_totala',
        'kodigoa'
    ];

    protected function casts(): array
    {
        return [
            'prezio_totala' => 'decimal:2',
            'kopurua' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekitaldia()
    {
        return $this->belongsTo(Ekitaldia::class);
    }
}
