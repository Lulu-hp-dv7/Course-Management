<?php

namespace App\Http\Requests\speciality;

use Illuminate\Foundation\Http\FormRequest;

class SpecialityStoreRequest extends FormRequest
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
            'code_sp' => 'required',
            'name_sp' => 'required',
            'desc_sp' => 'required',
            'type' => 'required',
            'sector_id' => 'required',
            'hCM' => 'required',
            'hTD' => 'required',
            'hTP' => 'required'
        ];
    }
}
