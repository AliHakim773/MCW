<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function get_current_user(){
        $user = Auth::user();
        return $user;
    }
    public function updateProfileImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        // Save the image path to the database
        $user = Auth::user();
        $user->image = $imageName;
        $user->save();

        return response()->json(['success' => 'Profile image updated successfully']);
    }
    public function show($id){return User::find($id);}
    public function index(){return User::all();}
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
