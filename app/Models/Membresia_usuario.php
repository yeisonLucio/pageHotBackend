<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia_usuario extends Model
{
    protected $table = "membresia_usuario";

    protected $fillable = ['estado'];

    public function Usuario(){
        return $this->hasMany('App\Models\User');

    }
    public function Membresia(){
        return $this->hasMany('App\Models\Membresia');

    }
}
