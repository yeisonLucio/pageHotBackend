<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class PaisController extends Controller
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
        $pais = $this->CrudRepository->getAll('App\Models\Pais'); 

        return $pais;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['nombre'];
        $pais = $this->CrudRepository->insert($request,$parameters,'App\Models\Pais',0);
        
        return $pais;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = $this->CrudRepository->getOne($id,'App\Models\Pais');
        
        return $pais;
        
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
        $parameters = ['nombre'];
        $pais = $this->CrudRepository->update($request,$parameters,'App\Models\Pais',$id);
        return $pais; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = $this->CrudRepository->delete($id,'App\Models\Pais');

        return $pais;
    }
}
