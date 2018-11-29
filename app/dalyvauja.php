<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dalyvauja extends Model
{
    protected $fillable = ['FK_EismoIvykis', 'FK_TransportoPriemone'];
}
