<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionsRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

	public function login()
	{
		return view('users.login');
	}

	/**
	 * @param SessionsRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store( SessionsRequest $request)
	{
		if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
			// Authentication passed...
			return redirect()->route('user.show', ['id' => Auth::user()->id]);
		}
		return redirect()->back()->with('failed', 'Password or username combo is incorrect');
	}

	public function destroy()
	{
		Auth::logout();
		return redirect()->back()->with('success', 'You\'ve been logged out');
	}

}
