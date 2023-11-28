<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'user_id' => 'nullable|integer',
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
            'title.required' => 'Raschot nomini kiriting',
            'title.max' => 'Raschot nomi 255 belgidan oshmasligi kerak',
            'type.required' => 'Raschot turini kiriting',
            'type.max' => 'Raschot turi 255 belgidan oshmasligi kerak',
            'user_id.integer' => 'Foydalanuvchi xato kiritildi',
        ];
    }
}
