<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'password'      =>'required|min:5',
            'passwordAgain' =>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'     =>'Bạn chưa nhập mật khẩu',
            'password.min'          =>'Mật khẩu quá ngắn',
            'passwordAgain.required'=>'Ban chua nhap lai mat khau',
            'passwordAgain.same'    =>'Mat khau nhap lai chua khop'
        ];
    }
}
