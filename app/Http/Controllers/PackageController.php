<?php

namespace App\Http\Controllers;

use App\Package;
use Auth;
use Illuminate\Http\Request;

class PackageController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (Auth::user()->role == 1) {
			$fetchAllPackages = Package::all();
			return view('package.index', compact('fetchAllPackages'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('package.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$storePackage = new Package();
		$storePackage->package_name = $request->get('name');
		$storePackage->validity = $request->get('validity');
		$storePackage->save();
		return redirect('view/packages')->with('success', 'Package Added Successfully !');
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
		$fetchPackageDetails = Package::where(['package_id' => $id])->first();
		return view('package.edit', compact('fetchPackageDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$updatePackage = Package::findOrFail($id);
		$updatePackage->package_name = $request->get('name') ?? $updatePackage->package_name;
		$updatePackage->validity = $request->get('validity') ?? $updatePackage->validity;
		$updatePackage->save();

		return redirect('view/packages')->with('success', 'Package Updated Successfully !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$deletePackage = Package::findOrFail($id);
		$deletePackage->delete();
		return redirect('view/packages')->with('success', 'Package Deleted Successfully !');
	}
}
