<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required'
        ]);

        $user =User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);
        $defaultList= UserList::create([
            'list_name'=>'All',
            'user_id'=>$user->id
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=>$user,
            'default'=>$defaultList,
            'token'=>$token
        ];
        return response($response,201);

    }
    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string|'
        ]);

        $user=User::where('email',$fields['email'])->first();
        if(!$user ||!Hash::check($fields['password'],$user->password)){
            return response(['message'=>'bad creds'],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);

    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return[
            'message'=>'logged out'
        ];

    }

}
