<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
	protected $primaryKey = 'package_id';
	protected $table = 'packages';
}
