<?php

namespace App\Http\Controllers;

use App\Repository\CiudadRepository;
use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    protected $CrudRepository;
    protected $CiudadRepository;

    public function __construct(CrudRepository $crudRepository, CiudadRepository $ciudadRepository){
        $this->CrudRepository = $crudRepository;
        $this->CiudadRepository = $ciudadRepository;

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudad = $this->CrudRepository->getAll('App\Models\Ciudad'); 

        return $ciudad;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['nombre','departamento_id'];
        $ciudad = $this->CrudRepository->insert($request,$parameters,'App\Models\Ciudad',0);
        
        return $ciudad;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = $this->CrudRepository->getOne($id,'App\Models\Ciudad');
        
        return $ciudad;
        
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
        $parameters = ['nombre','departamento_id'];
        $ciudad = $this->CrudRepository->update($request,$parameters,'App\Models\Ciudad',$id);
        return $ciudad; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = $this->CrudRepository->delete($id,'App\Models\Ciudad');

        return $ciudad;
    }

    public function municipiosPorDepartamento($departamento_id){
        
        $ciudades = $this->CiudadRepository->ciudadesPorDepartamento($departamento_id);
        
        return $ciudades;
    }
}
