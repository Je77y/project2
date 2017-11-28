<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class SlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten'=>'required|max:100|min:3',
            'mota'=>'required|max:255|min:3',
            'link'=>'required|max:255|min:3',
            'hinhanh'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'ten.required'=>'Bạn chưa nhập tên',
            'ten.min'=>'Tên quá ngắn',
            'ten.max'=>'Tên quá dài',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'mota.max'=>'Mô tả quá dài',
            'mota.min'=>'Mô tả quá ngắn',
            'link.required'=>'Bạn chưa nhập đường dẫn',
            'link.min'=>'Đường dẫn quá ngắn',
            'link.max'=>'Đường dẫn quá dài',
            'hinhanh.required'=>'Bạn chưa lấy hình ảnh'
        ];
    }
}
