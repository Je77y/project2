<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|unique:TheLoai,Ten'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.min'=> 'Tên thể loại quá ngắn',
            'name.max'=>'Tên thể loại quá dài',
            'name.unique'=>'Tên đã tồn tại'
        ];
    }
}
