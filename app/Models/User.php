<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','userName', 'email','telefono','edad','sexo','tipo','rol'
    ];

    public function Pais(){
        return $this->hasMany('App\Models\Pais');

    }   
    public function Departamento(){
        return $this->hasMany('App\Models\Departamento');

    }     
    public function Ciudad(){
        return $this->hasMany('App\Models\Ciudad');

    }  

    public function Servicio(){
        return $this->belongsTo('App\Models\Servicio');

    }  

    public function Membresia_usuario(){
        return $this->belongsTo('App\Models\Membresia_usuario');

    }
    public function anuncios(){
        return $this->hasMany('App\Models\Anuncio');

    }

    


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }
}
