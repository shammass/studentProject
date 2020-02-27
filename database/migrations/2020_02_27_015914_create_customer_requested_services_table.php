<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRequestedServicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('customer_requested_services', function (Blueprint $table) {
			$table->increments('request_id');
			$table->integer('service_id');
			$table->integer('customer_id');
			$table->integer('accepted_by');
			$table->string('description');
			$table->string('city')->nullable();
			$table->string('pincode')->nullable();
			$table->string('address')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('customer_requested_services');
	}
}
