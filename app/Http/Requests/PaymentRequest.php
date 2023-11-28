<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'price' => 'required | integer',
            'user_id' => 'required | integer',
            'day_id' => 'required | integer',
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
            'price.required' => 'Tolov qiymatini kiriting',
            'price.integer' => 'Tolov qiymatini raqam bilan kiriting',
            'user_id.required' => 'Mijozni tanlang',
            'user_id.integer' => 'Mijoz xato tanlandi',
            'day.required' => 'Kunni tanlang',
            'day.integer' => 'Kun xato tanlandi',
        ];
    }
}
