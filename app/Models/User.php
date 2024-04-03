<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lend;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'number_id',
		'name',
		'last_name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	/* protected $casts = [
		'email_verified_at' => 'datetime',
	]; */

	/**
	 * Get all of the lends for the customer user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function customerLends(): HasMany
	{
		return $this->hasMany(Lend::class, 'customer_user_id', 'id');
	}

	/**
	 * Get all of the lends for the owner user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function ownerLends(): HasMany
	{
		return $this->hasMany(Lend::class, 'owner_user_id', 'id');
	}
}
