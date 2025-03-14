<?php

namespace App\Http\Requests\timeslot;

use Illuminate\Foundation\Http\FormRequest;

class TimeslotRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i|after:startTime',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'La date est requise',
            'startTime.required' => 'L\'heure de début est requise',
            'endTime.required' => 'L\'heure de fin est requise',
            'endTime.after' => 'L\'heure de fin doit être après l\'heure de début',
        ];
    }

}
