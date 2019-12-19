<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class ServicioController extends Controller
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
        $servicio = $this->CrudRepository->getAll('App\Models\Servicio'); 

        return $servicio;
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
        $servicio = $this->CrudRepository->insert($request,$parameters,'App\Models\Servicio',1);
        
        return $servicio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = $this->CrudRepository->getOne($id,'App\Models\Servicio');
        
        return $servicio;
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
        $servicio = $this->CrudRepository->update($request,$parameters,'App\Models\Servicio',$id);
        return $servicio; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = $this->CrudRepository->delete($id,'App\Models\Servicio');

        return $servicio;
    }
}
