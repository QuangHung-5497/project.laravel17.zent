<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute khong duoc de trong',
            'max'=>':attribute khong duoc qua :max',
            'email'=>':attribute khong dung dinh dang',
            'unique'=>':attribute da ton tai'
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
            'name'=>'Ten user',
            'email'=>'Email',
            'password'=>'Mat khau'
        ];
    }
}
