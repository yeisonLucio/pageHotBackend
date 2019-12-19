<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class AnuncioController extends Controller
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
}
