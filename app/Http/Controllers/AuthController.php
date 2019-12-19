<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nombre' => 'required',
            'userName' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
            'telefono' => 'required',
            'edad' => 'required',
            'sexo' => 'required',
            'tipo' => 'required',
            'rol' => 'required',
            'pais_id' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required'
        ]);
        if ($validate->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);
        }
        $user = new User;
        $user->nombre = $request->nombre;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telefono = $request->telefono;
        $user->edad = $request->edad;
        $user->sexo = $request->sexo;
        $user->tipo = $request->tipo;
        $user->rol = $request->rol;
        $user->pais_id = $request->pais_id;
        $user->departamento_id = $request->departamento_id;
        $user->ciudad_id = $request->ciudad_id;
        $user->save();
        return response()->json(['status' => 'success'], 200);
    }
    public function login(Request $request)
    {   
        $user = ""; 
        if($request->userName){
            $user = 'userName';
        }else{
            $user = 'email';
        }
        $credentials = $request->only($user, 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 200, 'token'=>$token], 200)->header('Authorization', $token);
        }
        
        return response()->json(['status' => 401, 'error' => 'login_error'],401);
    }
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }
    private function guard()
    {
        return Auth::guard();
    }
}
