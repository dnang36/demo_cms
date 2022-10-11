<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>[
              'bail',
              'required',
            ],
            'description'=>[
                'bail',
                'required'
            ],
        ];
    }

    public function messages()
    {
        return [
          'required'=>':attribute bắt buộc phải điền',
        ];
    }

    public function attribute()
    {
        return [
            'name'=>'cột tên',
            'description'=>'cột mô tả',
        ];
    }
}
