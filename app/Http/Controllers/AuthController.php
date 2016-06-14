<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegisterPage()
    {
        if (Auth::guest()) {
            return view('auth.register');
        }

        return redirect()->route('dashboard');
    }

    public function getLoginPage()
    {
        if (Auth::guest()) {
            return view('auth.login');
        }

        return redirect()->route('dashboard');
    }
    
    public function postRegister(Request $request)
    {
        $user = new User();

        $user->login = $request['login'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        $user->roles()->attach(Role::where('name', 'User')->first());
        
        Auth::login($user);

        return redirect()->route('dashboard');
    }
    
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }
    
    public function getLogout()
    {
        Auth::logout();
        
        return redirect()->back();
    }
}