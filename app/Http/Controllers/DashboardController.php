<?php

namespace App\Http\Controllers;

use App\CustomerRequestedService;
use App\Feedback;
use App\Http\Controllers;
use App\Package;
use App\Payment;
use App\User;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		if (Auth::user()->role === 4) {
			return view('dashboard.infoPage');
		}
		$getServiceProviderCount = User::where('role', '>', 2)->count();
		$getCustomerCount = User::where('role', 2)->count();
		$getAcceptedServiceProviderCount = User::where(['role' => 3])->count();

		if (Auth::user()->role == 1) {
			$requestCount = CustomerRequestedService::count();
			$subscribedUsers = Payment::select('service_provider_id')->distinct()->get()->count();
			$totalFeedback = Feedback::count();
			return view('dashboard.index', compact('getServiceProviderCount', 'getCustomerCount', 'requestCount', 'subscribedUsers', 'totalFeedback'));
		} else if (Auth::user()->role == 2) {
			return view('dashboard.customer', compact('getServiceProviderCount', 'getCustomerCount'));
		} else {
			$packages = Package::pluck('package_name', 'package_id');
			$getExpiryDate = Payment::select('expiry')->where(['service_provider_id' => Auth::user()->user_id])->orderBy('created_at', 'DESC')->first();
			$now = Carbon::now();
			if ($now->todatestring() >= $getExpiryDate->expiry) {
				return view('dashboard.payment', compact('packages'));
			}
			$servicesCount = CustomerRequestedService::where(['accepted_by' => Auth::user()->user_id])->count();
			$userType = User::where(['user_id' => Auth::user()->user_id])->first();
			if ($servicesCount == 50 && $userType->type === "Trial") {
				return view('dashboard.payment', compact('packages'));
			}

			return view('dashboard.service_provider', compact('getServiceProviderCount', 'getCustomerCount', 'userType'));
		}
	}

}
