<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use DB;
class AreaProfesional extends Model
{
    //
    protected $table="area_profesional";

    protected $fillable = [
        'id','area_id','profesional_id'
    ];

    public function profesionalTo()
    {
        return $this->belongsTo('Cinema\Profesional');
    }

    public static function getProfesionalByArea($area, $exclude) {
        //return DB::table('area_profesional')->where('area_id', '=', $area)->get();

        return DB::table('profesionals')
            ->join('area_profesional','profesionals.id','=','area_profesional.profesional_id')
            ->where('area_profesional.area_id', '=', $area)
            ->whereNotIn('profesionals.id', $exclude)
            -> select('profesionals.*','area_profesional.area_id')->get();
    }
}
