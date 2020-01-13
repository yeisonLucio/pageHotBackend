<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use App\Repository\AnuncioRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Anuncio;
use App\Models\Imagen;
use App\Models\User;

class AnuncioController extends Controller
{
    protected $CrudRepository;
    protected $AnuncioRepository;
    public function __construct(CrudRepository $crudRepository, AnuncioRepository $anuncioRepository){
        $this->CrudRepository = $crudRepository;
        $this->AnuncioRepository = $anuncioRepository;

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncio = $this->CrudRepository->getAll('App\Models\Anuncio'); 

        return $anuncio;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['titulo','descripcion'];
        $anuncio = $this->CrudRepository->insert($request,$parameters,'App\Models\Anuncio',1);
        
        return $anuncio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anuncio = $this->CrudRepository->getOne($id,'App\Models\Anuncio');
        
        return $anuncio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parameters = ['titulo','descripcion'];
        $anuncio = $this->CrudRepository->update($request,$parameters,'App\Models\Anuncio',$id);
        return $anuncio; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = $this->CrudRepository->delete($id,'App\Models\Anuncio');

        return $anuncio;
    }

    public function AnunciosHome(){

        $anuncios = Anuncio::all();

        $anunciosHome = new Collection();

        foreach($anuncios as $item){
            
          $anunciosHome->push([
            'idAnuncio' => $item->id,
            'titulo' => $item->titulo,
            'descripcion' => strip_tags($item->descripcion),
            'usuario' => User::find($item->usuario_id),
            'imagenes' => Anuncio::find($item->id)->imagenes

          ]);
              
        }

        return $anunciosHome;


    }

    public function crearAnuncio(Request $request){

        
        $parameters = ['titulo','descripcion'];
        $anuncio = $this->CrudRepository->insert($request,$parameters,'App\Models\Anuncio',1);
        $idAnuncio = $anuncio->getData()->id;

 
         if($request->imagenes){
            $imagenes = $request->imagenes;
            foreach( $imagenes as $file){
                $extencionArchivo = $file->extension();
                $archivo = $file->storeAs('public','imagen'.time().'.'.$extencionArchivo);
                $url = Storage::url($archivo);
                $request->ruta = $url;
                $request->miniaturaAnuncio = 'SI';
                $request->anuncio_id = $idAnuncio;
                $parametros = ['ruta', 'miniaturaAnuncio', 'anuncio_id'];
                $this->CrudRepository->insert($request,$parametros,'App\Models\Imagen',0);
            }

        } 


    }
}
