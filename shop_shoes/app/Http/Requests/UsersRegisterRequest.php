<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name_register' => 'required',
            'password_register' => 'required',
            'email_register' => 'required|unique:users,email',
            'address_register' => 'required',
            'phone_register' => 'required|numeric|min:10|unique:users,phone',
        ];
    }

    public function messages(){
        return [
            'user_name_register.required' => ' - Họ và tên không được để trống',
            'password_register.required' => ' - Mật khẩu không được để trống',
            'email_register.required' => ' - Email không được để trống',
            'address_register.required' => ' - Địa chỉ không được để trống',
            'phone_register.required'=> ' - Số điện thoại không được để trống',
            'email_register.unique' => ' - Email này đã tồn tại',
            'phone_register.unique' => ' - Số điện thoại này đã tồn tại',
            'phone_register.numeric'=> ' - Số điện thoại không được có chữ',
            'phone_register.min'=> ' - Số điện thoại không được lớn hơn 10 kí tự',
        ];
    }
}
