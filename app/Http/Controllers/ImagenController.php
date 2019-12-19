<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    protected $CrudRepository;
    public function __construct(CrudRepository $crudRepository){
        $this->CrudRepository = $crudRepository;

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagen = $this->CrudRepository->getAll('App\Models\Imagen'); 

        return $imagen;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['ruta','miniaturaAnuncio','anuncio_id'];
        $imagen = $this->CrudRepository->insert($request,$parameters,'App\Models\Imagen',0);
        
        return $imagen;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = $this->CrudRepository->getOne($id,'App\Models\Imagen');
        
        return $imagen;
        
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
        $parameters = ['ruta','miniaturaAnuncio'];
        $imagen = $this->CrudRepository->update($request,$parameters,'App\Models\Imagen',$id);
        return $imagen; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = $this->CrudRepository->delete($id,'App\Models\Imagen');

        return $imagen;
    }
}
