<?php

namespace App\Http\Controllers;

use App\Camper;
use App\CamperImage;
use App\Http\Requests\SendContactRequest;
use App\Jobs\ContactJob;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function home()
	{
		$campers = Camper::all();
		return view('layouts.home')->with('campers', $campers);
	}

	public function show($id)
	{
		$campers = Camper::all();
		$page = Page::where('slug', $id)->first();
		return view('pages.show')->with('page', $page)->with('campers', $campers);
	}

	/**
	 *
	 * @internal param $ Requests\SendContactRequest $
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function sendContact( SendContactRequest $request )
	{
		$this->dispatch(new ContactJob($request->all()));
		return redirect()->back()->with('success', 'Thanks we\'ll be in touch soon');
	}
}
