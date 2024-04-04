<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
		];

		if ($this->method() == 'POST') {
			// Post method
			array_push($rules['name'], 'unique:categories,name');
		} else {
			// Put method
			array_push($rules['name'], 'unique:categories,name,' . $this->category->id);
		}

		return $rules;
	}
}
