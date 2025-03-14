<?php

namespace App\Http\Requests\course;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
            'code_course' => 'required|min:4|unique:courses,code_course',
            'name_course' => 'required|min:4|unique:courses,name_course',
            'desc_course' => 'required|min:4',
            'type_course' => 'required|min:4',
            'ues' => ['array', 'exists:u_e_s,id', 'required'],
        ];
    }
}
