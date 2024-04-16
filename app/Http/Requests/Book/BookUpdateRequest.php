<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\Book\BookRequest;

class BookUpdateRequest extends BookRequest
{
	public function rules()
	{
		$this->rules['file'] = ['nullable', 'image'];
		return $this->rules;
	}
}
