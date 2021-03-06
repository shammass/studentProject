<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $primaryKey = 'user_id';
	protected $table = 'users';
	protected $fillable = [
		'username', 'name', 'email', 'password', 'contact_no', 'profile', 'license_image', 'description', 'service_type', 'role',
		'address', 'city', 'pincode',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
}
