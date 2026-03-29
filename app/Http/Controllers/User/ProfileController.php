<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $userId=Auth::id();
        $user=DB::table('users')->where('id', $userId)->first();
        $categories = Category::all();
        return view('client.profile', compact('user', 'categories'));
    }
}
