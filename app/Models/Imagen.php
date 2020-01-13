<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";

    protected $fillable = ['ruta','miniaturaAnuncio'];

    public function anuncio(){
        return $this->belongsTo('App\Models\Anuncio');

    }
}
