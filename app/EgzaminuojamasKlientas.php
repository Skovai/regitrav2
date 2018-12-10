<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EgzaminuojamasKlientas extends Model
{
    protected $fillable = [
        'FK_klientas', 'FK_egzaminas'
    ];
}
