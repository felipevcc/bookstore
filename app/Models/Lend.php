<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lend extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'customer_user_id',
		'owner_user_id', // Librarian
		'book_id',
		'date_out',
		'date_in',
		'status',
	];

	/**
	 * Get the book that owns the Lend
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function book(): BelongsTo
	{
		return $this->belongsTo(Book::class, 'book_id', 'id');
	}

	/**
	 * Get the customer user to whom the book was lent
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function customer(): BelongsTo
	{
		return $this->belongsTo(User::class, 'customer_user_id', 'id');
	}

	/**
	 * Get the librarian user who delivered the book
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner(): BelongsTo
	{
		return $this->belongsTo(User::class, 'owner_user_id', 'id');
	}
}
