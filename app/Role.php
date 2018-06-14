<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table= 'roles';

    protected $fillable=['nameRol'];
}
