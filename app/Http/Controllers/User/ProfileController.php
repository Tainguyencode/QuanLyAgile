<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $userId=Auth::id();
        $user=DB::table('users')->where('id', $userId)->first();
        $categories = Category::all();
        return view('client.profile', compact('user', 'categories'));
    }
    public function edit()
    {
        $user = DB::table('users')
            ->where('id', Auth::id())
            ->first();
        $categories = Category::all();
        return view('client.profile_edit', compact('user', 'categories'));
    }
    public function update(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => ['required','regex:/^0[0-9]{9}$/','unique:users,phone,' . $userId],
            'password' => 'nullable|min:6|confirmed'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'SĐT không hợp lệ',
            'phone.unique' => 'SĐT đã tồn tại',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu không khớp'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        // Nếu có nhập password mới thì mới update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

    
        DB::table('users')
            ->where('id', $userId)
            ->update($data);

        return redirect()->route('client.profile')->with('success', 'Cập nhật thành công');
    }
}
