<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    private $modelUser;
    public function __construct()
    {
        $this->modelUser=new User();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=$this->modelUser->getAll();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=$this->modelUser->getAll();
        return view('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
            'phone'=>['required','regex:/^0[0-9]{9}$/','unique:users'],
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'role'=>'required|in:user,admin'
        ],
        [
            'name.required'=>'Vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại phải 10 số và bắt đầu bằng 0',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất có 6 ký tự',
            'role.required'=>'Vui lòng nhập phân quyền',
            'password.confirmed'=>'Mật khẩu không trùng khớp',
        ]);
        $data=([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'user'
        ]);
        $this->modelUser->insertUser($data);
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=$this->modelUser->findByid($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=$this->modelUser->findByid($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => ['required','regex:/^0[0-9]{9}$/','unique:users,phone,' . $id],
            'password' => 'nullable|min:6|confirmed',
            'role'=>'required|in:user,admin'
        ],
        [
            'name.required'=>'Vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại phải 10 số và bắt đầu bằng 0',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất có 6 ký tự',
            'role.required'=>'Vui lòng nhập phân quyền',
        ]);
        $data=([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'role'=>$request->role
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $this->modelUser->updateUser($id, $data);
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->modelUser->deleteUser($id);
        return redirect()->route('user');
    }
}
