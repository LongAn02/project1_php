<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersLoginRequest extends FormRequest
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
            'email_Login' => 'required',
            'pass_Login' => 'required',
        ];
    }

    public function messages(){
        return [
            'email_Login.required' => ' - Email không được để trống',
            'pass_Login.required' => ' - Mật khẩu không được để trống',
        ];
    }
}
