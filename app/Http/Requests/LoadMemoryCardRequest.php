<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoadMemoryCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:6|max:6',
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
            'code.required' => 'Save code is required',
            'code.min' => 'Save code should contain 6 characters',
            'code.max' => 'Save code should contain 6 characters',
        ];
    }
}
