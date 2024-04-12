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
		return [
			'category_id' => ['required', 'exists:categories,id'],
			'author_id' => ['required', 'exists:authors,id'],
			'title' => ['required', 'string'],
			'stock' => ['required', 'numeric'],
			'description' => ['required', 'string'],
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'El título es requerido.',
			'title.string' => 'El nombre debe de ser válido.',
			'description.required' => 'La descripción es requerida.',
			'description.string' => 'La descripción debe de ser válida.',
			'stock.required' => 'La cantidad es requerida.',
			'stock.numeric' => 'La cantidad debe de ser un numero válido.',
			'author_id.required' => 'El autor es requerido.',
			'author_id.exists' => 'El autor no existe.',
			'category_id.required' => 'La categoría es requerida.',
			'category_id.exists' => 'La categoría no existe.',
		];
	}
}
