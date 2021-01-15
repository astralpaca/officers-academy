<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionLoadRequest extends FormRequest
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
            'code.required' => 'Session code is required',
            'code.min' => 'Session code should contain 6 characters',
            'code.max' => 'Session code should contain 6 characters',
        ];
    }
}
