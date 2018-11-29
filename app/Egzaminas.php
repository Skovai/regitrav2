<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egzaminas extends Model
{
    protected $fillable = [
    	'data', 'pradzia', 'pabaiga', 'kaina', 'vieta', 'tipas', 'arIslaikyta', 'FK_Marsrutas', 'FK_Klientas'
    ];
}
