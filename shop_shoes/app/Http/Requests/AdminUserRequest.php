<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'input_search_user' => 'required|numeric|min:10',
        ];
    }

    public function messages(){
        return [
            'input_search_user.required'=> 'Số điện thoại không được để trống',
            'input_search_user.numeric'=> 'Số điện thoại không được có chữ',
            'input_search_user.min'=> 'Số điện thoại không được lớn hơn 10 kí tự',
        ];
    }
}
