<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
		$rules = [
			'name' => ['required', 'string'],
			'biography' => ['required', 'string'],
		];

        return $rules;
    }
}
