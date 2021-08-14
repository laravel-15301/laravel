<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use PharIo\Manifest\Email;

class StoreRequest extends FormRequest

{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->all());
        return [
            'name' => 'required|max:100',
            'password' => 'required|min:8|max:100',
            'email' =>"required|email|unique:users,email",
            'address' => 'required',
            'role' => 'required|in:'.implode(',', config('common.user.role')),
            'gender' => 'required|in:'.implode(',', config('common.user.role')),
            
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' =>'Họ tên không được để trống',
            // 'name.max' =>'Họ tên không được quá 100 kí tự ',
            // 'password.required' => 'Password ko được để trống',

            'required' => ':attribute ko được để trông',
            'name.max' =>'Họ tên không được quá 100 kí tự ',
            'email.email' =>'Sai định dạng email',
            'email.unique' =>'Email đã tồn tại',
            
        ];
    }

    public function attributes()
    {
        return[
            'name' => 'họ tên',
            'email' => 'email',
            'password'=> 'mật khẩu',
            'address'=> 'địa chỉ',
            'role'=> 'Tài khoản',
            'gender' =>'giới tính'
        ];
    }

}
