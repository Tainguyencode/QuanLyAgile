<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


Route::prefix('admin')->group(function () {

    Route::get('/', function () {

        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        return view('admin.dashboard');
    });

    //Danh mục
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    //Sản phẩm
    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::delete('/products/show/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
});
