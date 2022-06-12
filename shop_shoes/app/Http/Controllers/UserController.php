<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRegisterRequest;
use App\Http\Requests\UsersLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function createUser(UsersRegisterRequest $request){
        DB::table('users')->insert([
            'name' => $request->user_name_register,
            'email' => $request->email_register,
            'password' => bcrypt($request->password_register),
            'address' => $request->address_register,
            'phone' => $request->phone_register,
            'remember_token' => csrf_token(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
            'email_verified_at' => new \DateTime(),
        ]);

        return redirect()->route('login');
    }

    public function loginUser(UsersLoginRequest $request){
        $arr = [
            'email' => $request->email_Login,
            'password' => $request->pass_Login,
        ];
        if (Auth::attempt($arr)){
            $user = User::where('email',$arr['email'])->first();
            Session::put('userName',$user['name']);
            Session::put('userEmail',$user['email']);
            Session::put('userId',$user['id']);
            return redirect('/');
        }else {
            return redirect(route('login'))->with(['erro' => 'Tài khoản này không tồn tại vui lòng đăng kí']);
        }
    }

    public function logoutUser(){
        Session::destroy(); //// thầy chữa
        return redirect(route('login'));
    }

    public function showUsers(){
        $users = DB::table('users')->get();
        return $users;
    }

    public function showUserSearch($phone){
        $user = DB::table('users')->where('phone',$phone)->get();
        return $user;
    }

    public function deleteUsers($id){
        $users = DB::table('users')->where('id',$id)->delete();
        return $users;
    }
}
