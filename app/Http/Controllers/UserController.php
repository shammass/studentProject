<?php

namespace App\Http\Controllers;
use App\Service;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Image;
use Validator;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	public function profile() {
		$users = User::all();
		$service = Service::pluck('service_name', 'service_id');
		$serviceIds = [];
		$getMyService = Service::select('service_name')
			->whereIn('service_id', explode(',', Auth::user()->service_type))
			->get();

		return view('user.profile', compact('users', 'service', 'getMyService'));
	}

	public function changepassword() {
		$users = User::all();
		return view('user.changepassword', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function updateprofile(Request $request, $user_id) {
		$Usr = User::find($user_id);
		$Usr->username = $request->input('username') ?? $Usr->username;
		$Usr->email = $request->input('email') ?? $Usr->email;
		$Usr->contact_no = $request->input('contact_no') ?? $Usr->contact_no;
		$Usr->address = $request->input('address') ?? $Usr->address;
		$Usr->pincode = $request->input('pincode') ?? $Usr->pincode;
		$Usr->city = $request->input('city') ?? $Usr->city;
		$Usr->description = $request->input('description') ?? $Usr->description;
		if ($request->input('service')) {
			$isAlreadyAdded = User::select('service_type')
				->where(['service_type' => $request->input('service'), 'user_id' => Auth::user()->user_id])
				->first();
			if ($isAlreadyAdded) {
				return redirect('user/profile')->with('error', 'Cannot Add Duplicate Service');
			}
			$Usr->service_type = Auth::user()->service_type . ',' . $request->input('service');
		}
		if ($request->hasFile('profile')) {
			$image = $request->file('profile');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(128, 128)->save(public_path('/upload/profileimage/' . $filename));
			$Usr->profile = $filename;
		}
		$Usr->save();
		//User::find($user_id)->update($request->all());
		return redirect('user/profile')->with('success', 'Profile updated successfully');
	}

	public function updatePassword(Request $request, $user_id) {
		$rules = array(
			'old_password' => 'required|string|min:6',
			'new_password' => 'required|string|min:6',
			'confirm_password' => 'required|same:new_password',
		);

		$validator = Validator::make(Input::only('old_password', 'new_password', 'confirm_password'), $rules);

		if ($validator->fails()) {
			return redirect('changepassword')->with('error', 'new password & confirm Password must be 6 Characters !');
		} else {
			$users = User::where('user_id', '=', $user_id)->first();
			if (Hash::check(Input::get('old_password'), $users->password)) {
				if (Input::get('new_password') == Input::get('confirm_password')) {
					$users->password = Hash::make(Input::get('new_password'));
					$users->save();
					return redirect('changepassword')->with('success', 'Password changed Successfully !');
				} else {
					return redirect('changepassword')->with('error', 'New password and Confirm password did not match !');
				}
			} else {
				return redirect('changepassword')->with('error', 'Current password is incorrect !');
			}
		}

	}
}
