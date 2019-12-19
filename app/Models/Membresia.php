<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = "membresia";

    protected $fillable = ['nombre','valor'];

    public function Membresia_usuario(){
        return $this->belongsTo('App\Models\Membresia_usuario');

    }

}
