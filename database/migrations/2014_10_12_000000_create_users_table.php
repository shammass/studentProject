<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('user_id');
			$table->string('username');
			$table->string('password');
			// $table->string('name');
			$table->integer('role')->default(3);
			$table->string('address')->default('NULL');
			$table->string('city')->default('NULL');
			$table->string('pincode')->default('NULL');
			$table->string('contact_no');
			$table->string('email')->unique();
			// $table->string('status');
			// $table->string('profile_image');
			// $table->string('profile_summary');
			// $table->string('auth_key');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
