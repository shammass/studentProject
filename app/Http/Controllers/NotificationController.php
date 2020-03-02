<?php

namespace App\Http\Controllers;
use App\CustomerRequestedService;
use App\Feedback;
use App\Service;
use App\User;
use Auth;

class NotificationController extends Controller {
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$fetchMyService = User::where(['user_id' => Auth::user()->user_id])->first();
		$fetchMyServiceId = Service::select('service_id')->whereIn('service_id', explode(',', $fetchMyService->service_type))->get();
		$serviceId = explode(',', $fetchMyService->service_type);

		$fetchRequestedService = CustomerRequestedService::where(['accepted_by' => 0])->whereIn('service_id', $serviceId)->get();
		return view('notification.serviceProvider', compact('fetchRequestedService'));
	}

	public function acceptRequest($id) {
		$updateCustomerRequest = CustomerRequestedService::findOrFail($id);
		$updateCustomerRequest->accepted_by = Auth::user()->user_id;
		$updateCustomerRequest->save();
		return redirect('/show/notifications')->with('success', 'Accepted Successfully !');
	}

	public function viewServiceProvider($id) {
		$fetchServiceProviderDetails = User::where(['user_id' => $id])->first();
		$fetchRatings = Feedback::where(['feedback_to' => $id])->sum('rating');
		$count = Feedback::where(['feedback_to' => $id])->count();
		$rating = round($fetchRatings / $count);

		return view('notification.viewServiceProvider', compact('fetchServiceProviderDetails', 'rating'));
	}
}
