<?php

namespace App\Http\Requests\tag;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>[
                'bail',
                'required',
            ],
            'slug'=>[
                'bail',
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute bắt buộc phải điền',
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'cột tên',
            'slug'=>'cột slug',
        ];
    }
}
