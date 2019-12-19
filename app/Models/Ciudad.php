<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function Departamento(){
        return $this->hasMany('App\Models\Departamento');

    }

    public function Usuario(){
        return $this->belongsTo('App\Models\User');

    }  
}
