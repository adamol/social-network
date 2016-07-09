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
		$requests = Auth::user()->friendRequests();

		return view('friends.index')
			->with('friends', $friends)
			->with('requests', $requests);
	}

	public function add($username)
	{
		$user = User::where('username', $username)->first();

		if (!$user) {
			return redirect()
				->route('home')
				->with('info', 'No such user in database.');
		}

		if (Auth::user()->id === $user-id) {
			return redirect()->route('home');
		}

		if (Auth::user()->hasFriendRequestPending($user)
			|| $user->hasFriendRequestPending(Auth::user())) {
			return redirect()
				->route('profile.index', ['username' => $user->username])
				->with('info', 'Friend request already pending.');
		}

		if (Auth::user()->isFriendsWith($user)) {
			return redirect()
				->route('profile.index', ['username' => $user->username])
				->with('info', 'You are already friends.');
		}

		Auth::user()->addFriend($user);

		return redirect()
			->route('profile.index', ['username' => $user->username])
			->with('info', 'Friend request sent.');
	}

	public function accept($username)
	{
		$user = User::where('username', $username)->first();

		if (!$user) {
			return redirect()
				->route('home')
				->with('info', 'No such user in database.');
		}

		if (!Auth::user()->hasReceivedFriendRequest($user)) {
			return redirect()->route('home');
		}

		Auth::user()->acceptFriendRequest($user);

		return redirect()
				->route('profile.index', ['username' => Auth::user()->username])
				->with('info', 'Successfully accepted friend request.');
	}
}