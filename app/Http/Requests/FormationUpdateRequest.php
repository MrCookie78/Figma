<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationUpdateRequest extends FormRequest
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
            'titre' => ['required', 'string', 'min:10'],
            'description' => ['required', 'string', 'min:10'],
            'prix' => ['required', 'numeric'],
            'checkboxCategories' => ['nullable'],
            'checkboxTypes' => ['nullable']
        ];
    }
}
