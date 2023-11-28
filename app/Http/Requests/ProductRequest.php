<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'quantity' => 'required | integer',
            'changed_price' => 'nullable | integer',
            'user_id' => 'required',
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
            'quantity.required' => 'Mahsulot sonini kiriting',
            'quantity.integer' => 'Mahsulot sonini raqam bilan kiriting',
            'changed_price.integer' => 'Mahsulot narxini raqam bilan kiriting',
            'user_id.required' => 'Yetkazib beruvchini kiriting',
            'day.required' => 'Kunni tanlang',
            'day.integer' => 'Kun xato tanlandi',
        ];
    }
}
