<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiTinRequest extends FormRequest
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
            'name'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            'id'=>'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập tên loại tin',
            'name.min'=>'Tên quá ngắn',
            'name.max'=>'Tên quá dài',
            'name.unique'=>'Tên đã tồn tại',
            'id.required'=>'Bạn chưa chọn thể loại',
            'id.integer'=>'Bạn vui lòng chọn lại thể loại'
        ];
    }
}
