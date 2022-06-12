<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            'input_search_productAdmin' => 'required',
        ];
    }

    public function messages(){
        return [
            'input_search_productAdmin.required'=> 'Tên điện thoại không được để trống',
        ];
    }
}
