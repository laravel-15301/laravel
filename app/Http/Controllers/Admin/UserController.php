<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

// use App\Http\Requests\Admin\User\StoreRequest;

use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    public function index()
    {
        // SELECT * FROM users;
        $listUser = User::all();  // User::all lấy ra tất cả các bản ghi

        // SELECT * FROM invoices WHERE user_id IN (...)
        $listUser->load(['invoices']);

        return view('admin/users/index', [
            'data' => $listUser,
        ]);
        
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('admin/users/create');
    }

    public function store(Request $request)
    {
        $inputs = $request->only('name', 'email', 'address','password', 'gender', 'role');
        $rules = [
            'name' => 'required|max:100',
            'password' => 'required|min:8|max:100',
            'email' =>"required|email|unique:users,email",
            'address' => 'required',
            'role' => 'required|in:'.implode(',', config('common.user.role')),
            'gender' => 'required|in:'.implode(',', config('common.user.role')),
        ];
        $messages= [
            'required' => ':attribute ko được để trống',
            'name.max' =>'Họ tên không được quá 100 kí tự ',
            'email.email' =>'Sai định dạng email',
            'email.unique' =>'Email đã tồn tại',
            
        ];
    
        $attributes = [
            'name' => 'họ tên',
            'email' => 'email',
            'password'=> 'mật khẩu',
            'address'=> 'địa chỉ',
            'role'=> 'Tài khoản',
            'gender' =>'giới tính'
        ];

        $request->validate($rules, $messages, $attributes);

        User::create($inputs);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', [
            'data' => $user,
        ]);
    }

    public function update(Request $request, $user)
    
    {
        $inputs = $request->only('name', 'email', 'address','password', 'gender', 'role');
        $rules = [
            'name' => 'required|max:100',
            'password' => 'required|min:8|max:100',
            'email' =>"required|email|unique:users,email",
            'address' => 'required',
            'role' => 'required|in:'.implode(',', config('common.user.role')),
            'gender' => 'required|in:'.implode(',', config('common.user.role')),
        ];
        $messages= [
            'required' => ':attribute ko được để trống',
            'name.max' =>'Họ tên không được quá 100 kí tự ',
            'email.email' =>'Sai định dạng email',
            'email.unique' =>'Email đã tồn tại',
            
        ];
    
        $attributes = [
            'name' => 'họ tên',
            'email' => 'email',
            'password'=> 'mật khẩu',
            'address'=> 'địa chỉ',
            'role'=> 'Tài khoản',
            'gender' =>'giới tính',
        ];

        $request->validate($rules, $messages, $attributes);
        $user = User::findOrFail($user);

        $user->fill($inputs);
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
