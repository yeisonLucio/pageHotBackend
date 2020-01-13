<?php
namespace App\Repository;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoRepository { 

    public function obtenerDepartamentosPorPais($pais_id){

        $result =  DB::table('pais')
                        ->join('departamento','pais.id','=','departamento.pais_id')
                        ->where('departamento.pais_id','=',$pais_id)
                        ->select('departamento.*')
                        ->get();

        return $result;


    }

}