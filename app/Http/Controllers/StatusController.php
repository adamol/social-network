<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
	public function postStatus(Request $request)
	{
		$this->validate($request,  [
			'status' => 'required|max:140'
		]);

		Auth::user()->statuses()->create([
			'body' => $request->input('status')
		]);

		return redirect()
			->route('home')
			->with('info', 'Status was posted.');
	}
}