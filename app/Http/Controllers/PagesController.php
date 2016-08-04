<?php

namespace App\Http\Controllers;

use App\Camper;
use App\CamperImage;
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
		$page = Page::where('slug', $id)->first();
		return view('pages.show')->with('page', $page);
	}
}
