<?php
namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CrudRepository {

    public function getAll($model){

        $result = $model::all();

        if($result){
            return response()->json(['status'=>200,'data'=>$result]);
        }else{
            return response()->json(['status'=>404,'mensaje'=>'no existen registros']);
        }
    }

    public function insert($data,array $parameters,$model,$user){

       
        $instancia = new $model();

        foreach($parameters as $parameter){
            $instancia->$parameter = $data->$parameter;
        }
        if($user==1){
            $idUser = Auth::user()->id;
            $instancia->usuario_id = $idUser;
        }
        $instancia->save();
        return response()->json(['status' => 'success'], 200);

    }

    public function getOne($id,$model){

        $result = $model::find($id);

        if($result){
            return response()->json(['status'=>200,'data'=>$result]);

        }else{

            return response()->json(['status'=>404,'mensaje'=> 'registro no encontrado']);

        }

    }

    public function update ($data,array $parameters,$model,$id){

        $result = $model::find($id);

        if($result){

            foreach($parameters as $parameter){
                $result->$parameter = $data->$parameter;
            }
            $result->save();
            
            return response()->json(['status'=>200,'mensaje'=>'registro actualizado']);
            
            }else{
                return response()->json(['status'=>404,'mensaje'=>'registro no encontrado']);
            }

    }

    public function delete ($id,$model){

        $result = $model::find($id);

        if($result){
            $result->delete();
            return response()->json(['status'=>200,'mensaje'=>'registro eliminado']);
        }else{
            return response()->json(['status'=>404,'mensaje'=>'registro no encontrado']);
        }

    }

}