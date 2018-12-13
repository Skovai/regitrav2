<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saskaita extends Model
{
    protected $fillable = [
        'suma', 'paskirtis', 'isdavimo_data', 'isdavimo_laikas', 'terminas','darbuotojas_id', 'FK_Klientas'
    ];

    protected $table = 'saskaita';
}
