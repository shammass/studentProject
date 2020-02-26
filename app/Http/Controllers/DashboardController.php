<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\User;

class DashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$getServiceProviderCount = User::where('role', '>', 2)->count();
		$getCustomerCount = User::where('role', 2)->count();
		return view('dashboard.index', compact('getServiceProviderCount', 'getCustomerCount'));
	}

}
