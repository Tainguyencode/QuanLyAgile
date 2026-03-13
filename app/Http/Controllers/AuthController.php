<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function showLogin(){
        return view('auth.login');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ], [
            'name.required'=>'Vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất có 6 ký tự',
            'password.confirmed'=>'Mật khẩu không trùng khớp',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user'
        ]);
        Auth::login($user);
        return redirect('/user')->with('success', 'Đăng ký thành công');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user=Auth::user();
            if($user->role=='admin'){
                return redirect('/admin');
            }else{
                return redirect('/user');
            }
        }
        return back()->with('error', 'Email hoặc mật khẩu không đúng');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}