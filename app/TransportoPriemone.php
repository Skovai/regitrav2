<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportoPriemone extends Model
{
    protected $fillable = ['valstybinisNr', 'VIN', 'marke', 'modelis', 'spalva', 'kategorija', 'galingumas', 'FK_Klientas'];
}
