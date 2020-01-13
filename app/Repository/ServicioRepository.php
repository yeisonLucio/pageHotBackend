<?php
namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioRepository { 

    public function getServiciosPorId($idUsuario){

        $result =  DB::table('servicio')
                ->where('usuario_id','=',$idUsuario)
                ->select('*')
                ->get();

        return $result;

    }
}