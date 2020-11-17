<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    protected $fillable = [
        'id_school','id_user','list_course'
    ];
}
