<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/dashboard';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	public function serviceRegister() {
		$fetchAllServices = Service::all();
		return view('auth.service_register', compact('fetchAllServices'));
	}

	public function customerRegister() {
		return view('auth.customer_register');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		if ($data['role'] === 4) {
			return Validator::make($data, [
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:6', 'confirmed'],
				'address' => ['required', 'string', 'max:255'],
				'city' => ['required', 'string', 'max:25'],
				'pin' => ['required', 'string', 'max:10'],
				'contact' => ['required', 'string', 'max:10'],
				'services' => ['required', 'string', 'max:150'],
				'profile_image' => ['required', 'string', 'max:255'],
				'description' => ['required', 'string', 'max:255'],
			]);
		} else {
			return Validator::make($data, [
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:6', 'confirmed'],
				'address' => ['required', 'string', 'max:255'],
				'city' => ['required', 'string', 'max:25'],
				'pin' => ['required', 'string', 'max:10'],
				'contact' => ['required', 'string', 'max:10'],
			]);
		}
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		if ($data['role'] == 4) {
			if ($data['license_image']) {
				$image = $data['license_image'];
				$license_image = time() . '.' . $image->getClientOriginalExtension();
				Image::make($image)->resize(128, 128)->save(public_path('/upload/profileimage/' . $license_image));
			}
			if ($data['profile_image']) {
				$image = $data['profile_image'];
				$profile_image = time() . '.' . $image->getClientOriginalExtension();
				Image::make($image)->resize(128, 128)->save(public_path('/upload/profileimage/' . $profile_image));
			}
			return User::create([
				'username' => $data['name'],
				'email' => $data['email'],
				'address' => $data['address'],
				'city' => $data['city'],
				'pincode' => $data['pin'],
				'contact_no' => $data['contact'],
				'role' => 4,
				'password' => Hash::make($data['password']),
				'license_image' => $license_image,
				'profile' => $profile_image,
				'service_type' => implode(',', $data['services']),
				'description' => $data['description'],
			]);
		} else {
			return User::create([
				'username' => $data['name'],
				'email' => $data['email'],
				'address' => $data['address'],
				'city' => $data['city'],
				'pincode' => $data['pin'],
				'contact_no' => $data['contact'],
				'role' => 2,
				'password' => Hash::make($data['password']),
			]);
		}

	}
}
