<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zinute extends Model
{
    protected $fillable = [ 'tipas', 'zinute', 'FK_KlientasSenas', 'FK_KlientasNaujas', 'FK_TransportoPriemone', 'FK_Darbuotojas', 'FK_Klientas'];
    
    protected $table = 'zinute';
}
