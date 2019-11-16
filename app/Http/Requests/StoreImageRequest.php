<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'images.*'=>'image|max:2000',
            'images'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'max'=>':attribute khong duoc qua 2MB',
            'image'=>':attribute khong dung dinh dang',
            'required'=>':attribute khong duoc de trong',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'images'=>'Anh',
        ];
    }
}
