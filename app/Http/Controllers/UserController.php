<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use AuthenticatesUsers;

    protected $username = 'user_id';

    public function validateLogin(Request $request)
    {
        $this->validate($request,[
           "user_id" => "required|max:15",
            "user_password" => "required|max:20",
        ]);
    }

    protected function credentials(Request $request){

    }


    public function showLogin(){
        return view('login');
    }

    public function doLogin(Request $request){
        $this->validate($request,  [
            "user_id" => "required|max:15",
            "password" => "required|max:20",
        ],[
            "user_id.required" => "User ID harus diisi!",
            "user_id.max" => "User ID tidak boleh melebihi 15 karakter!",
            "password.required" => "Password harus diisi!",
            "password.max" => "Password tidak boleh melebihi 20 karakter!",
        ]);

        if(Auth::viaRemember()){

        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/login');
    }


}
