<?php

namespace App\Http\Controllers;
use Auth;
use User;
use App\Uji;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function register()
    {
    	return view('auth.register');
    }

    public function postregister(Request $request)
    {


    	$request->validate([
        'name'=> 'required',
        'email' => 'required',
        'password'=> 'required',
        ]);

        $user =  new \App\User; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(60); 
        $user->save();

       return redirect('/login');
    	
    }

    public function postlogin(Request $request)
    {

    	$request->validate([
        'username'=> 'required',
        'password'=> 'required',
        ]);


    	if(Auth::attempt($request->only('username','password')))
    	{
    		return redirect('/home');
    	}else{
    	return redirect('/login')->with('danger','username atau Sandi Salah');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
