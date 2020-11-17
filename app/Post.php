<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id_user','id_school','id_classe','course','title','content','file1'];
}
