<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
	protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
			'biography' => $this->faker->paragraph()
        ];
    }

	public function configure()
	{
		return $this->afterCreating(function (Author $author) {
			// 8 books are created for each author
			Book::factory(8)->authorId($author)->create();
		});
	}
}
