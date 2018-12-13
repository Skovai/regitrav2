<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klientas extends Model
{
  protected $fillable = [
      'vardas', 'pavarde', 'asmens_kodas', 'tel_nr',
      'miestas', 'adresas', 'gimimo_data', 'e_pastas', 'FK_Darbuotojas', 'FK_Pirisijungimo_id'
  ];
}
