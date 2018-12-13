<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Darbuotojas extends Model
{
    protected $fillable = [
        'pareigos', 'vardas', 'pavarde', 'miestas', 'adresas', 'telefonas', 'e_pastas', 'asmens_kodas', 'gimimo_data', 'FK_Pirisijungimo_id'
    ];
}
