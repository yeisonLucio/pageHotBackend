<?php

namespace App\Http\Controllers;
use App\Repository\CrudRepository;
use Illuminate\Http\Request;

class MembresiaController extends Controller
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
        $membresias = $this->CrudRepository->getAll('App\Models\Membresia'); 

        return $membresias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = ['nombre','valor'];
        $membresia = $this->CrudRepository->insert($request,$parameters,'App\Models\Membresia',0);
        
        return $membresia;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membresia = $this->CrudRepository->getOne($id,'App\Models\Membresia');
        
        return $membresia;
        
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
        $parameters = ['nombre','valor'];
        $membresia = $this->CrudRepository->update($request,$parameters,'App\Models\Membresia',$id);
        return $membresia; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membresia = $this->CrudRepository->delete($id,'App\Models\Membresia');

        return $membresia;
    }
}
