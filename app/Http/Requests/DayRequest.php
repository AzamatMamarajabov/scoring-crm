<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayRequest extends FormRequest
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
            'day' => 'required | date | unique:days',
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
            'day.required' => 'Kunni kiriting',
            'day.date' => 'Kun qiymatini sana toifasida kiriting',
            'day.unique' => 'Bu kun oldin kiritilgan',
        ];
    }
}
