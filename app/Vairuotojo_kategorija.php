<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vairuotojo_kategorija extends Model
{
  protected $fillable = [
      'isdavimo_data', 'kategorija', 'FK_Vairuotojo_pazymejimas'
  ];
}
