<?php

namespace App\Http\Requests\ue;

use Illuminate\Foundation\Http\FormRequest;

class UEStoreRequest extends FormRequest
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
            'code' => 'required|min:4',
            'name_ue' => 'required|min:4',
            'credit' => 'required|min:1',
            'hCM' => 'required|min:1',
            'hTD' => 'required|min:0',
            'hTP' => 'required|min:0',
            'semester_id' => 'required'
        ];
    }
}
