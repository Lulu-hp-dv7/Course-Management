<?php

namespace App\Http\Requests\cycle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CycleUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'min:4',
                Rule::unique('cycles', 'name')->ignore($this->cycle)
            ],
            'description' => 'required|min:4'
        ];
    }
}
