<?php

namespace App\Http\Requests\sector;

use Illuminate\Foundation\Http\FormRequest;

class SectorStoreRequest extends FormRequest
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
            'code_sec' => 'required|min:2',
            'name_sec' => 'required|min:4',
            'desc_sec' => 'required|min:4',
            'levels' => ['array', 'exists:levels,id', 'required'],

        ];
    }
}
