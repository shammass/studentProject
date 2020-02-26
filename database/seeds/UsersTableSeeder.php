<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		User::create([
			'username' => 'Admin',
			'password' => 'admin321',
			'contact_no' => '9876543210',
			'email' => 'admin@demo.com',
			'role' => 1,
			'remember_token' => str_random(10),
		]);
	}
}
