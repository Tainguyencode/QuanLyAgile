<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', [AuthController::class,'showLogin']);

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',function(){
    return view('auth.register');
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::prefix('admin')->group(function(){

    Route::get('/', function () {

        if(!Auth::check()){
            return redirect('/login');
        }

        if(Auth::user()->role != 'admin'){
            abort(403);
        }

        return view('admin.dashboard');

    });

    Route::get('/categories',[CategoryController::class,'index']);

});
