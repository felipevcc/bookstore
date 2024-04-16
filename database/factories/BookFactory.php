<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\File;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
	protected $model = Book::class;

	public function authorId(Author $author)
	{
		return $this->state([
			'author_id' => $author->id
		]);
	}

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'category_id' => $this->faker->randomElement([1, 2, 3]),
			'title' => $this->faker->sentence(),
			'stock' => $this->faker->randomDigit(),
			'description' => $this->faker->paragraph()
		];
	}

	public function configure()
	{
		return $this->afterCreating(function (Book $book) {
			$file = new File(['route' => '/storage/images/books/default.png']);
			$book->file()->save($file);
		});
	}
}
