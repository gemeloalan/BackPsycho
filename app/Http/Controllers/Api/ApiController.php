<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    use ApiResponse;
    //POST [NAME<EMAIL<PASSWORD]
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6'
        ]);
        
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $this->successResponse('message', 'Se creo Correctamente', 201);
      
    }
    //POST [EMAIL<PASSWORD]
    public function login(Request $request)
    {
       //Validation
       $request->validate([
           'email' => 'required|email|string',
           'password' => 'required|string'
       ]);

       //EmailCheck
$user = User::where('email', $request->email)->first();
if(!empty($user)){
    if(Hash::check($request->password,$user->password)){
        $token = $user->createToken('token')->accessToken;
        $user->token = $token;
        return $this->successResponse('token', $user, 200);

    }else{

        return $this->errorResponse('Contrase;a Incorrectas', 401);
    };
    //Passeord
    
} else{
        return $this->errorResponse('NO se encontro ninguna cuenta con ese correo Incorrectas', 401);
    }}
    //GET [Auth:Token]
    public function profile(Request $request)
    {
        $user = auth()->user();
        return $this->successResponse('user', $user, 200);
    }
    //GET [Auth:Token]
    public function logout(Request $request)
    {
       $token = auth()->user()->token();
         $token->revoke();
         return $this->successResponse('message', 'Se cerro la sesion', 200);
    }
}
