<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'middle_name' => 'required|string',
            'dob' => 'required|date',
            'sex' => 'required|in:male,female',
            'dominant_hand' => 'required|max:1|in:L,R,B',
            'diagnosis' => 'required|max:20'
        ];
    }
}
