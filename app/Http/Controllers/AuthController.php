<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $loginInfo = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($loginInfo)) {
            return redirect('admin');
        }

        return redirect()->back()->with('error', 'Login Failed, Try Again');
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('frontsite.home');
    }


    public function register()
    {
        return view('auth.register');
    }
    public function do_register(AuthRequest $request)
    {
        //validate in AuthRequest
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
        Session::flash("msg","s:User Created Successfully");

        return redirect()->route('login');
    }
}
