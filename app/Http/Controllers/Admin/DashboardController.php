<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function home()
    {
        return view("admin.home");
    }

    public function login()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $email = $request->email;
        $pwd = $request->password;

        $credentials = [
            'email'    => $email,
            'password' => $pwd,
        ];
        
        $user = \Sentinel::authenticate($credentials);
        if ($user != null) {
            return redirect()->route('admin');
        } else {
            $err = 'Invalid username or password';
            return view('admin.login', compact('err'));
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function processRegister(Request $request )
    {   
        $request->validate([
            'email'    => 'required|email|unique:users',
            'password'    => 'required',
        ],
        [
            'email.required' => 'Bat buoc nhap email',
            'password.required' => 'Bat buoc nhap password',
            'email.unique'=>'Email nay da duoc dang ky'
        ]);

        $email = $request->email;
        $pwd = $request->password;

        
        
        $credentials = [
            'email'    => $email,
            'password' => $pwd,
        ];

       
            $user = \Sentinel::create($credentials);
            $activation = \Activation::create($user);
            
        return redirect()->route('login')->with('success','Dang ky thanh cong');


    }

    public function logout()
    {
        \Sentinel::logout();
        return redirect()->route('login');
    }
}
