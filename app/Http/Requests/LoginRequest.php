<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => 'required | min:13',
            'password' => 'required | min:3'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => 'Telefon raqamni kiriting',
            'phone.min' => '13ta belgidan iborat telefon raqam kiriting',
            'password.required' => 'Parolni kiriting',
            'password.min' => 'Kamida 3ta belgidan iborat parol kiriting',
        ];
    }
}
