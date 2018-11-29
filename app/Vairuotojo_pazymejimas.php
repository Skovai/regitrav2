<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vairuotojo_pazymejimas extends Model
{
  protected $fillable = [
      'isdavimo_data', 'galiojimo_data', 'pazymejimo_nr', 'FK_Klientas'
  ];
}
