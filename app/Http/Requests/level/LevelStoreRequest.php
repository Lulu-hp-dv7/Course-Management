<?php

namespace App\Http\Requests\level;

use Illuminate\Foundation\Http\FormRequest;

class LevelStoreRequest extends FormRequest
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
            'name' => 'required|min:4',
            'number' => 'required|integer|min:0',
            'cycle_id' => 'exists:cycles,id|required'
        ];
    }
}
