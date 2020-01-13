<?php
namespace App\Repository;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnuncioRepository { 

    public function AnunciosHome (){

       /*  $servicios = DB::table('servicio')
                    ->join('users','users.id','=','servicio.usuario_id')
                    ->where('servicio.usuario_id','=',$id)
                    ->select('servicio.*')
                    ->get();

/* 
        $anuncios = DB::table('anuncio')
                            ->join('users','users.id','=','anuncio.usuario_id')
                            ->select('anuncio.id as idAnuncio',
                                     'anuncio.descripcion',
                                     'anuncio.titulo',
                                     'users.*')
                                   
                            
                            ->get(); */
        /* return $servicios;  */


        /* $result = DB::table('anuncio')
                        ->rightjoin('imagen','anuncio.id','=','imagen.anuncio_id')
                        ->join('users','users.id','=','anuncio.usuario_id')
                        ->join('servicio','users.id','=','servicio.usuario_id')
                        ->select('anuncio.*',
                        'users.*',
                        'imagen.*',
                        'servicio.id as id_servicio',
                        'servicio.nombre as nombreServicio')
                        ->groupBy('imagen.anuncio_id')
                        ->get(); */

        $imagenes = DB::table('imagen')
                        ->join('anuncio', 'anuncio.id','=','imagen.anuncio_id')
                        ->select('imagen.ruta','anuncio.*')
                        ->groupBy('imagen')
                        ->get();
        return $imagenes;
                        
    }

}