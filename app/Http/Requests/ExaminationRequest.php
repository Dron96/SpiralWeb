<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequest extends FormRequest
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
            'patient_id' => 'required|integer|exists:patients,id',
            'hand' => 'required|max:1|in:L,R|string',
            'spiral_type' => 'required|max:2|string|in:Cp,In,Sp',
            'bad_effects' => 'required|string|max:6',
            'exam_date' => 'required|date',
            'exam_time' => 'required',
            'x' => 'required',
            'y' => 'required',
            't' => 'required'
        ];
    }
}
