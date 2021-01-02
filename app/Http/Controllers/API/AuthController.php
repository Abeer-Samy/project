<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;;
class AuthController extends Controller
{
    public function login(Request $request){
        $loginInfo = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($loginInfo)){
        $user = Auth::user();
        $token = $user->createToken('my api token')->accessToken;
            return response([
                'status'=>'success',
                'token'=>$token
            ]);
        }
        return response([
            'status'=>'error',
            'message'=>'invalid authentication'
        ]);
    }
}
?>
