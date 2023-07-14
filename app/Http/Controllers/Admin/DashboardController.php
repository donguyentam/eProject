<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\OrderDetail;
use App\Models\Order;

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
        $request -> validate([
            'email' =>"required | email |exists:users",
            'password' =>"required",

        ],
        [
            'email.required' => 'ENTER EMAIL',
            'email.email' => 'ENTER THE CORRECT EMAIL TYPE',
            'password.required' => 'ENTER PASSWORD',
            'email.exists'=>'EMAIL IS NOT REGISTERED',
            'password.exists' => 'ENTER PASSWORD',
        ]);

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
            $err = 'WRONG PASSWORD';
            session()->flash('error', $err);
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
            'email'    => 'required|max:50|email|unique:users',
            'password'    => 'required|confirmed',
        ],
        [
            'email.required' => 'ENTER EMAIL',
            'password.confirmed' => 'VERIFICATION PASSWORD IS NOT THE SAME',
            'email.max' => 'ENTER NO MORE THAN 50 CHARACTERS',
            'password.required' => 'ENTER PASSWORD',
            'email.unique'=>'THE EMAIL WAS REGISTERED',
        ]);

        $email = $request->email;
        $pwd = $request->password;



        $credentials = [
            'email'    => $email,
            'password' => $pwd,
        ];


            $user = \Sentinel::create($credentials);
            $activation = \Activation::create($user);
            \Activation::complete($user, $activation['code']);
        return redirect()->route('login')->with('success','Register success');



    }

    function forgetPassword(){
        return view('admin.forget-password');
    }
    function complete($id){
        $order=Order::where('id', $id)->get();
        $orderd=OrderDetail::where('order_id',$id)->get();
        return view('fe.complete',compact('order','orderd'));
    }

    function forgetPasswordPost(Request $request){
        $request->validate([
            'email' =>"required | email |exists:users",
        ],
        [
            'email.required' => 'ENTER EMAIL',
            'email.email' => 'ENTER THE CORRECT EMAIL TYPE',
        ]);


        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request -> email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send("admin.emails.forget-password",['token'=>$token,'email' => $request -> email], function ($message) use ($request) {
            $message -> to($request->email);
            $message -> subject("Reset Password");
        });
        $success = 'SENDING LINK RESET PASSWORD TO YOUR MAIL';
        session()->flash('success', $success);
        return view('admin.forget-password',compact('success'));
    }

    function resetPassword($token){
        $email=DB::table('password_reset_tokens')->where('token',$token)->first();
        return view('admin.new-password',compact('token','email'));
    }

    function resetPasswordPost(Request $request){
        $request -> validate([
            
            'password'    => 'required|confirmed',

        ],
    [
        
            
            'password.required' => 'ENTER PASSWORD',
            'password.confirmed' => 'VERIFICATION PASSWORD IS NOT THE SAME'
           
    ]);


        $updatePassword = DB::table('password_reset_tokens')->where([
            'token' => $request -> token
        ])->first();

        if (!$updatePassword){
            return redirect()->to(Route('resetPassword'))->with('error','Invalid');
        }

        User::where('email', $request -> email)->update(['password'=> Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();

        $success = 'RESET PASSWORD SUCCESSFUL';
        session()->flash('success', $success);
        return redirect()->to(route('login',compact('success')));
    }


    public function logout(Request $request)
    {
        \Sentinel::logout();
        // xóa cart
        $cart = $request->session()->get('Cart');
        $request->session()->forget('Cart');
        return redirect()->to(route('home'));

    }
    public function logoutad(Request $request)
    {
        \Sentinel::logout();
        // xóa cart
        $cart = $request->session()->get('Cart');
        $request->session()->forget('Cart');
        return redirect()->to(route('login'));

    }
}
