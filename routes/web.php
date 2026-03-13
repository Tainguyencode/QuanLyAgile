<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
Route::get('/', [AuthController::class,'showLogin']);

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',function(){
    return view('auth.register');
});

Route::post('/register',[AuthController::class,'register']);

Route::get('/admin',function(){
    if(!Auth::check()){
        return redirect('/login');
    }

    if(Auth::user()->role != 'admin'){
        abort(403);
    }
    return view('admin.dashboard');
});

Route::get('/user',function(){
    if(!Auth::check()){
        return redirect('/login');
    }
    return view('user.dashboard');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});