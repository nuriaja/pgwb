<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }
     public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' =>['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        $message =[
            'required' => ':atribut harus diisi dulu',
        ];

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ],$message);
    }

    public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
    }

}
