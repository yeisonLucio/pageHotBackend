<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    protected $CrudRepository;
    public function __construct(CrudRepository $crudRepository){
        $this->CrudRepository = $crudRepository;

    D
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = $this->CrudRepository->getAll('App\Models\Departamento'); 

        return $departamento;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['nombre','pais_id'];
        $departamento = $this->CrudRepository->insert($request,$parameters,'App\Models\Departamento',0);
        
        return $departamento;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = $this->CrudRepository->getOne($id,'App\Models\Departamento');
        
        return $departamento;
        
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
        $parameters = ['nombre','pais_id'];
        $departamento = $this->CrudRepository->update($request,$parameters,'App\Models\Departamento',$id);
        return $departamento; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = $this->CrudRepository->delete($id,'App\Models\Departamento');

        return $departamento;
    }
}
