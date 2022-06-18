<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Car;

class PartRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // retrieve car id to validation car_id in the request if it is existing in the car database data
        $car_ids = Car::all()->pluck('id')->toArray();
        $car_ids[] = '';

        return [
            'name' => 'required|max:2047',
            'serialnumber' => 'required|max:99',
            'car_id' => 'in:' . implode(',',($car_ids)) . '|nullable',  // test if request car_id is in the car model database or data is not sent
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
            'serialnumber.required' => 'Sériové číslo, údaj je potrebné vyplniť.',
            'car_id.in' => 'Zadané ID auta neexistuje.',
        ];
    }
}
