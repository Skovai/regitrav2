<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EismoIvykis extends Model
{
    protected $fillable = ['data', 'laikas', 'vieta', 'aprasas', 'pareigunai'];
}
