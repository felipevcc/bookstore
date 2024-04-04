<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
			'category_id' => ['required', 'exists:categories,id'],
			'author_id' => ['required', 'exists:authors,id'],
			'title' => ['required', 'string'],
			'stock' => ['required', 'numeric'],
			'description' => ['required', 'string'],
		];

		return $rules;
	}
}
