<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'quantity' => 'integer | nullable',
            'debt' => 'integer | nullable',
            'paid' => 'integer | nullable',
            'price' => 'integer | nullable',
            'user_id' => 'nullable | integer',
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
            'quantity.integer' => 'To`langan summa yoki mahsulot sonini raqam bilan kiriting',
            'debt.integer' => 'Qarzdorlik summasini raqam bilan kiriting',
            'paid.integer' => 'To`langan summani raqam bilan kiriting',
            'price.integer' => 'Narxni raqam bilan kiriting',
            'user_id.required' => 'Mijozni tanlang',
            'user_id.integer' => 'Mijoz xato tanlandi',
            'day.required' => 'Kunni tanlang',
            'day.integer' => 'Kun xato tanlandi',
        ];
    }
}
