<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";

    protected $fillable = ['ruta','miniaturaAnuncio'];

    public function Anuncio(){
        return $this->hasMany('App\Models\Anuncio');

    }
}
