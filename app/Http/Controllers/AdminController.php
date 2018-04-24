<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showAddUser(){
        dd(Auth::check());
        return view('admin.add_user');
    }

    public function addNewUser(Request $request){
        $this->validate($request,  [
            "user_id" => "unique:users|required|max:15",
            "nama" => "required|max:25",
            "password" => "required|max:20",
        ],[
            "user_id.required" => "User ID harus diisi!",
            "user_id.unique" => "User ID sudah ada!",
            "user_id.max" => "User ID tidak boleh melebihi 15 karakter!",
            "nama.required" => "Nama harus diisi!",
            "nama.max" => "Nama tidak boleh melebihi 25 karakter!",
            "password.required" => "Password harus diisi!",
            "password.max" => "Password tidak boleh melebihi 20 karakter!",
        ]);


        $newUser = new User();
        $newUser->user_id = $request->user_id;
        $newUser->user_name = $request->nama;
        $newUser->password = bcrypt($request->password);
        $newUser->user_role = $request->role;

        $newUser->save();


        return redirect("/BonRegist/updateUser");
    }

    public function showUpdateUser(){
        $users = User::all();
        return view('admin.update_user')->with("users", $users);
    }

    public function editUser($id){
        $user = User::select(['user_id'])->where('user_id','=',$id);

//        return view('admin.update_data_user')->with('user', $user);
        return view('admin.update_data_user', ['user'=>$user]);
    }

    public function updateUser(Request $request, $id){
        $user = User::select(['user_id'])->where('user_id','=',$id);

        $user->user_name = $request->newName;
        $user->user_password = $request->newPassword;
        $user->user_role = $request->newRole;
        $user->save();

        return redirect('/BonRegist/updateUser');
    }

    public function deleteUser($id){
        $user = User::select(['user_id'])->where('user_id','=',$id);

        $user->delete();

        return redirect()->back();
    }


}
