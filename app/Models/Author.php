<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
		'biography',
	];

	/**
	 * Get all of the books for the Author
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function books(): HasMany
	{
		return $this->hasMany(Book::class, 'author_id', 'id');
	}
}
