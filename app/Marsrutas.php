<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marsrutas extends Model
{
    protected $fillable = [
    	'kelias', 'laikas', 'ilgis'
    ];
}
