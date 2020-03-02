<?php

namespace App\Http\Controllers;
use App\CustomerRequestedService;
use App\Feedback;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class FeedbackController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (Auth::user()->role === 1) {
			$fetchFeedbacks = Feedback::all();
		} else if (Auth::user()->role === 2) {
			$fetchFeedbacks = Feedback::where(['feedback_from' => Auth::user()->user_id])->get();
			return view('feedback.index', compact('fetchFeedbacks'));
		} else if (Auth::user()->role === 3) {
			$fetchFeedbacks = Feedback::where(['feedback_to' => Auth::user()->user_id])->get();
			return view('feedback.provider_feedback', compact('fetchFeedbacks'));
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if (Auth::user()->role === 2) {
			$fetchServiceProviderId = CustomerRequestedService::
				select('accepted_by')
				->where(['customer_id' => Auth::user()->user_id])
				->where('accepted_by', '>', 0)
				->get();
			return view('feedback.create', compact('fetchServiceProviderId'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			// 'image' => 'required',
			'rating' => 'required',

		]);
		if ($validator->fails()) {
			//return back to user creation page if validation fails
			return redirect()->back()
				->withErrors($validator)
				->withInput($request->all());
		}
		$storeFeedback = new Feedback();
		$storeFeedback->feedback_from = Auth::user()->user_id;
		$storeFeedback->feedback_to = $request->provider;
		$storeFeedback->feedback = $request->feedback;
		$storeFeedback->rating = $request->rating;
		$storeFeedback->save();
		return redirect('view/feedback')->with('success', 'Feedback sent successfully !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function view() {
		$getAllFeedbacks = Feedback::all();
		return view('feedback.adminview', compact('getAllFeedbacks'));
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
