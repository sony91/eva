<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Auxi extends Model
{
    protected $table='auxis';

    protected $fillable = ['name', 'email', 'password','surname','phone'];
}
