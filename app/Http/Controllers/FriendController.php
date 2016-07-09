<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
	public function index()
	{
		$friends = Auth::user()->friends();

		return view('friends.index')
			->with('friends', $friends);
	}
}