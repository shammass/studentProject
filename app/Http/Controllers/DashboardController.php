<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\User;
use Auth;

class DashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$getServiceProviderCount = User::where('role', '>', 2)->count();
		$getCustomerCount = User::where('role', 2)->count();
		$getAcceptedServiceProviderCount = User::where(['role' => 3])->count();
		if (Auth::user()->role == 1) {
			return view('dashboard.index', compact('getServiceProviderCount', 'getCustomerCount'));
		} else if (Auth::user()->role == 2) {
			return view('dashboard.customer', compact('getServiceProviderCount', 'getCustomerCount'));
		} else {
			return view('dashboard.service_provider', compact('getServiceProviderCount', 'getCustomerCount'));
		}
	}

}
