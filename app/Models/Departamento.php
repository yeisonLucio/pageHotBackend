<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamento";

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function Pais(){
        return $this->hasMany('App\Models\Pais');

    }

    public function Ciudad(){
        return $this->belongsTo('App\Models\Ciudad');

    }

    public function Usuario(){
        return $this->belongsTo('App\Models\User');

    }  


}
