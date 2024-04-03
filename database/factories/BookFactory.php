<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
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
}
