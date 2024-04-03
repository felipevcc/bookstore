<?php

namespace App\Models;

use App\Models\Lend;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'category_id',
		'author_id',
		'title',
		'stock',
		'description',
	];

	/**
	 * Get the category that owns the Book
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	/**
	 * Get the author that owns the Book
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author(): BelongsTo
	{
		return $this->belongsTo(Author::class, 'author_id', 'id');
	}

	/**
	 * Get all of the lends for the Book
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function lends(): HasMany
	{
		return $this->hasMany(Lend::class, 'book_id', 'id');
	}
}
