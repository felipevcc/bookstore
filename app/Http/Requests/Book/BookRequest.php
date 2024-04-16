<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
	protected $rules = [
		'category_id' => ['required', 'exists:categories,id'],
		'author_id' => ['required', 'exists:authors,id'],
		'title' => ['required', 'string'],
		'stock' => ['required', 'numeric'],
		'description' => ['required', 'string'],
		'file' => ['required', 'image'],
	];

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
		return $this->rules;
	}

	public function messages()
	{
		return [
			'title.required' => 'El título es requerido.',
			'title.string' => 'El nombre debe ser valido.',
			'description.required' => 'La descripción es requerida.',
			'description.string' => 'La descripción debe ser valida.',
			'stock.required' => 'La cantidad es requerida.',
			'stock.numeric' => 'La cantidad debe ser un numero valido.',
			'author_id.required' => 'El autor es requerido.',
			'author_id.exists' => 'El autor no existe.',
			'category_id.required' => 'La categoría es requerida.',
			'category_id.exists' => 'La categoría no existe.',
			'file.required' => 'La imagen es requerida.',
			'file.image' => 'El archivo debe ser una imagen valida.',
		];
	}
}
