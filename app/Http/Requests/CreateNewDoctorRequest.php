<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:2|max:32',
            'last_name' => 'required|min:2|max:64',
            'gender' => 'required',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'email' => 'required|email',
            'image' => 'required|image',
            'address' => 'required|min:2|max:255',
            'phone' => 'required|numeric|digits:10',
            'province_or_city' => 'required',
            'country' => 'required',
            'room' => 'required|min:2|max:64',
            'specialty' => 'required',
        ];
    }
}
