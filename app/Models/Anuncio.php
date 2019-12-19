<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "anuncio";

    protected $fillable = ['titulo','descripcion'];

    public function Usuario(){
        return $this->hasMany('App\Models\User');

    }
    public function Imagen(){
        return $this->belongsTo('App\Models\Imagen');

    }

}
