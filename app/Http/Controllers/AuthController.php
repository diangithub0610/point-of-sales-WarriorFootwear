<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            "email"=> "email|required",
            "kata_sandi_admin"=>"string|required"
        ]);

        if ($validate->fails()){
            return redirect ('/login')->with('error', 'validasi gagal');
        }
        
        $email = $request->input("email");
        $password = $request->input("kata_sandi_admin");
        $auth = admin::attemptLogin($email, $password);


          //khusus yang memiliki role
            // if(Auth::user()->role == "admin"){
            //     return redirect('/dashboard');
            // }elseif (Auth::user()->role == "pengguna"){
            //     return redirect("/dashboard-pengguna");
            // }elseif (Auth::user()->role == "reseller"){
            //     return redirect("/dashboard-reseller");
            // }
        if ($auth){
            return redirect()->route('admin.dashboard');
          
        }else{
            return back()->with("error", "username atau password salah");
        }
    }
}
