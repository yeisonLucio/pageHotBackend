<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "anuncio";
    

    protected $fillable = ['titulo','descripcion'];

    public function users(){
        return $this->belongsTo('App\Models\User');

    }
    public function imagenes(){
        return $this->hasMany('App\Models\Imagen');

    }

}
