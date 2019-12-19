<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicio";

    protected $fillable = ['nombre'];

    public function Usuario(){
        return $this->hasMany('App\Models\User');

    }
}
