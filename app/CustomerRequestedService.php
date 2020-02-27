<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRequestedService extends Model {
	protected $primaryKey = 'request_id';
	protected $table = 'customer_requested_services';

}
