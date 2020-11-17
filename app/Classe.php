<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
   protected $fillable = [
        'id_school','name','level','branche'
    ];
}
