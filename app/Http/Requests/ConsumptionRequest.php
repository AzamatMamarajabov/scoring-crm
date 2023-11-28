<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumptionRequest extends FormRequest
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
            'note' => 'max:255',
            'price' => 'required | integer',
            'expense_id' => 'required | integer'
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
            'note.max' => 'Harajat nomini 255 belgidan oshmasligi kerak',
            'price.required' => 'Harajat qiymatini kiriting',
            'price.integer' => 'Harajat qiymatini raqam toifasida kiriting',
            'expense_id.required' => 'Harajat turini kiriting',
            'expense_id.integer' => 'Harajat turi xato kiritildi',
        ];
    }
}
