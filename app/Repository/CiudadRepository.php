<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CiudadRepository { 

    public function ciudadesPorDepartamento($departamento_id){

        $result =  DB::table('departamento')
                        ->join('ciudad','departamento.id','=','ciudad.departamento_id')
                        ->where('ciudad.departamento_id','=',$departamento_id)
                        ->select('ciudad.*')
                        ->get();

        return $result;
    }
}