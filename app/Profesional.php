<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\carbon;
class Profesional extends Model
{
    //
    protected $table="profesionals";

    protected $fillable = [
        'name','surname','phone','invitado','namecarre_id','email','password'
    ];
    public static function boot(){
        parent::boot();
        static::creating(function ($profesional) {
            $profesional->code_number = Carbon::now()->timestamp;
        });
    }

    public function areas()
    {
        return $this->belongsToMany('Cinema\Area');
    }

    public function areasProfesional()
    {
        return $this->belongsToMany('Cinema\AreaProfesional');
    }
    public function profesionalProjects(){
        return $this->belongsToMany('Cinema\Proyecto', 'assignments');
    }


    public function carrera()
    {
        return $this->belongsTo('Cinema\Carrera', 'namecarre_id', 'id');
    }

    public static function Profesionals(){
        return DB::table('profesionals')
            ->join('areas','areas.id','=','profesionals.nameare_id')
            ->join('carreras','carreras.id','=','profesionals.namecarre_id')
            -> select('profesionals.*','areas.nameare','carreras.namecarre')
            ->paginate(2);
    }

    public static function getProfesionalCarreraArea($size = 5) {
        return DB::table('profesionals')
            ->join('carreras','carreras.id','=','profesionals.namecarre_id')
            -> select('profesionals.*','carreras.namecarre')
            ->paginate($size);
    }
}
