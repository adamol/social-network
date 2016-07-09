<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	public function index($username)
	{
		$user = User::where('username', $username)->first();

		if (!$user) {
			abort(404);
		}

		return view('profile.index')
			->with('user', $user);
	}
}