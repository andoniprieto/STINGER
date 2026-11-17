<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekitaldia extends Model
{
    /** @use HasFactory<\Database\Factories\EkitaldiaFactory> */
    use HasFactory;

    protected $table = 'ekitaldiak';

    // Kategoriak eta bakoitzaren kolorea
    const KOLOREAK = [
        'Musika' => '#9A3412',
        'Antzerkia' => '#1E3A8A',
        'Bertsolaritza' => '#9F1239',
        'Dantza' => '#6B21A8',
        'Haurrak' => '#166534',
        'Zinema' => '#334155',
    ];
    
    protected $fillable = [
        'izenburua',
        'deskribapena',
        'kategoria',
        'data',
        'ordua',
        'prezioa',
        'irudia',
        'edukiera',
        'aretoa'
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

    // Kategoria bakoitzaren kolorea
    public function kolorea()
    {
        return self::KOLOREAK[$this->kategoria] ?? '#334155';
    }

    // Adibidez: "Urriak 24, larunbata"
    public function dataLuzea()
    {
        $hilabeteak = ['Urtarrilak', 'Otsailak', 'Martxoak', 'Apirilak', 'Maiatzak', 'Ekainak', 'Uztailak', 'Abuztuak', 'Irailak', 'Urriak', 'Azaroak', 'Abenduak'];
        $asteEgunak = ['igandea', 'astelehena', 'asteartea', 'asteazkena', 'osteguna', 'ostirala', 'larunbata'];

        return $hilabeteak[$this->data->month - 1] . ' ' . $this->data->day . ', ' . $asteEgunak[$this->data->dayOfWeek];
    }

    // Adibidez: "URR"
    public function hilabeteLaburra()
    {
        $hilabeteak = ['URT', 'OTS', 'MAR', 'API', 'MAI', 'EKA', 'UZT', 'ABU', 'IRA', 'URR', 'AZA', 'ABE'];

        return $hilabeteak[$this->data->month - 1];
    }

    // Saldutako sarrerak
    public function salduta()
    {
        return $this->sarrerak->sum('kopurua');
    }

    // Geratzen diren lekuak
    public function libre()
    {
        return $this->edukiera - $this->salduta();
    }
}
