<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idLoaiTin'=>'required',
            'tieude'=>'required|min:3|max:100|unique:TinTuc,TieuDe',
            'tomtat'=>'required',
            'noidung'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'idLoaiTin.required'=>'Bạn chọn loại tin',
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'tieude.min'=>'Tiêu đề quá ngắn',
            'tieude.max'=>'Tiêu đề quá dài',
            'tieude.unique'=>'Tiêu đề đã tồn tại',
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'noidung.required'=>'Bạn chưa nhập nội dung'
        ];
    }
}
