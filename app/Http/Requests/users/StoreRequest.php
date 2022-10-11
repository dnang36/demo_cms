<?php

namespace App\Http\Requests\users;

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
                'required'
            ],
            'email'=>[
                'bail',
                'required',
                'email',
            ],
            'password'=>[
                'bail',
                'required'
            ]
        ];
    }

    public function messages():array
    {
        return [
            'required' =>':attribute bat buoc phai dien'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Cot ten',
            'email'=>'Email',
            'password'=>'mat khau'
        ];
    }
}
