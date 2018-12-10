<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventorius extends Model
{
    protected $fillable = [
        'darbuotojas_id', 'pavadinimas', 'serijos_numeris'
    ];
}
