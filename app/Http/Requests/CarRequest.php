<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:2047',
            'is_registered' => 'required',
            'registration_number' => 'required_if:is_registered,==,1|max:255',
        ];
    }

    /**
     * Return custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Názov, údaj je potrebné vyplniť.',
            'is_registered.required' => 'Registrované, údaj je potrebné vyplniť.',
            'registration_number.required_if' => 'Registračné číslo je potrebné vyplniť, ak je auto registrované.',
        ];
    }


}
