<?php

namespace App\Http\Controllers;

use App\CustomerRequestedService;
use App\Service;
use Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$fetchAllServices = Service::all();
		return view('service.index', compact('fetchAllServices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('service.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$addService = new Service();
		$addService->service_name = $request->get('service');
		$addService->save();
		return redirect('view/services')->with('success', 'Service Added Successfully !');
	}

	public function viewToCustomer() {
		$fetchAllServices = CustomerRequestedService::all();
		return view('customer.sendrequests', compact('fetchAllServices'));
	}

	public function sendRequest() {
		$fetchAllServices = Service::all();
		return view('customer.createRequest', compact('fetchAllServices'));
	}

	public function storeRequests(Request $request) {
		$storeService = new CustomerRequestedService();
		$storeService->service_id = $request->get('services');
		$storeService->customer_id = Auth::user()->user_id;
		$storeService->accepted_by = 0;
		$storeService->description = $request->get('description');
		$storeService->city = $request->get('city');
		$storeService->pincode = $request->get('pincode');
		$storeService->address = $request->get('address');
		$storeService->save();
		return redirect('/view/customer/services')->with('success', 'Request Sent Successfully !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$editSelectedService = Service::where(['service_id' => $id])->first();
		return view('service.edit', compact('editSelectedService'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$updateService = Service::findOrFail($id);
		$updateService->service_name = $request->get('service');
		$updateService->save();
		return redirect('view/services')->with('success', 'Service Updated Successfully !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$deleteService = Service::findOrFail($id);
		$deleteService->delete();
		return redirect('view/services')->with('success', 'Service Deleted Successfully !');
	}
}
