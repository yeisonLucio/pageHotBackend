<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";

    protected $fillable = ['nombre','updated_at', 'created_at'];
    public $timestamps = false;

    public function Usuario(){
        return $this->belongsTo('App\Models\User');

    }

    public function Departamento(){
        return $this->belongsTo('App\Models\Departamento');

    }   

}
