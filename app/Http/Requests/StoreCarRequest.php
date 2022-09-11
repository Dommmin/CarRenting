<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'name' => 'required',
            'year' => 'required|numeric|between:2020,2022',
            'fuel' => 'required',
            'fuel_consumption' => 'required|numeric',
            'seats' => 'required|numeric|between:4,5',
            'gearbox' => 'required',
            'price' => 'required|numeric',
            'horsepower' => 'required|numeric',
            'torque' => 'required|numeric',
            'acceleration' => 'required|numeric',
            'engine' => 'required|numeric',
            'drivetrain' => 'required|max:3',
            'available' => 'boolean',
//            'images' => 'required|array|mimes:jpg,jpeg,png|max:2048',
            'main' => 'nullable',
            'description' => 'required',
        ];
    }
}
