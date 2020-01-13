<?php

namespace App\Http\Controllers;

use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class Membresia_usuarioController extends Controller
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
        $membresias_usuario = $this->CrudRepository->getAll('App\Models\Membresia_usuario'); 

        return $membresias_usuario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['estado','membresia_id'];
        $membresia_usuario = $this->CrudRepository->insert($request,$parameters,'App\Models\Membresia_usuario',1);
        
        return $membresia_usuario;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membresia_usuario = $this->CrudRepository->getOne($id,'App\Models\Membresia_usuario');
        
        return $membresia_usuario;
        
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
        $parameters = ['estado','membresia_id'];
        $membresia_usuario = $this->CrudRepository->update($request,$parameters,'App\Models\Membresia_usuario',$id);
        return $membresia_usuario; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membresia_usuario = $this->CrudRepository->delete($id,'App\Models\Membresia_usuario');

        return $membresia_usuario;
    }
   
}
