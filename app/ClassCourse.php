<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    protected $fillable = [
        'id_school','id_class','list_course'
    ];
}
