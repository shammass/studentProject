<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$fetchAllServiceProviders = User::where('role', '>', 2)->get();
		return view('service.index', compact('fetchAllServiceProviders'));
	}

	public function accept($id) {
		$acceptServiceProvider = User::findOrFail($id);
		$acceptServiceProvider->role = 3;
		$acceptServiceProvider->save();
		return redirect('view/service_providers')->with('success', 'Accepted Service Provider !');
	}

	public function reject($id) {
		$acceptServiceProvider = User::findOrFail($id);
		$acceptServiceProvider->role = 4;
		$acceptServiceProvider->save();
		return redirect('view/service_providers')->with('error', 'Rejected Service Provider !');
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
		//
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
