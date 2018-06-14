<?php

namespace Cinema;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class Area extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nameare','namesubare'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($valor){
        // if(!empty($valor)){
        //     $this->attributes['password'] = \Hash::make($valor);
        // }
    }

    public function profesionals()
    {
        return $this->belongsToMany('Profesional');
    }

    public static function getAreas() {
        return DB::table('areas')
            ->whereNull('area_id')
            ->get();
    }

    public static function getSubAreas($area) {
        return DB::table('areas')->where('area_id', '=', $area)->get();
    }
}
