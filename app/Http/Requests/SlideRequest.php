<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class SlideRequest extends FormRequestpublic
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten'=>'required|max:100',
            'mota'=>'required|max:255|min:3',
        ];
    }
}
