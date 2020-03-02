<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class PaymentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'firstName' => 'required',
			'lastName' => 'required',
			'card_number' => 'required',
			'cvv' => 'required',
			'expiration_month' => 'required',
			'expiration_year' => 'required',
			'package' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput($request->all());
		}
		$now = Carbon::now();
		$nextYear = $now->addYear(1);

		$storePayment = new Payment();
		$storePayment->service_provider_id = Auth::user()->user_id;
		$storePayment->package_id = $request->get('package');
		$storePayment->expiry = $nextYear->todatestring();
		$storePayment->save();

		$updateUser = User::findOrFail(Auth::user()->user_id);
		$updateUser->type = "Subscription";
		$updateUser->save();

		return redirect('dashboard')->with('success', 'Activation Successfull');

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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
