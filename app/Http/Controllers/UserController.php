<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAll(){

        $users = User::all();

        return response()->json(['status'=>'success',
                                 'users'=>$users->toArray()],
                                 200);
    }

    public function findUser(Request $request, $id){
        $user = user::find($id);

        return response()->json(['status'=>'success',
                                 'user'=>$user->toArray()],
                                 200);
    }
}
