<?php

namespace App\Http\Requests\classroom;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'code_class' => 'required|min:2',
            'type_class'=> 'required|min:4',
            'capacity' => 'required|integer|min:1',
            'building_id' => 'exists:buildings,id|required'
        ];
    }
}
