<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnineApziura extends Model
{
    protected $fillable = ['atlikimoData', 'galiojimoData', 'kaina', 'arPraeita', 'FK_TransportoPriemone'];
    
    protected $table = 'technine_apziura';
}
