<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function home()
	{
		return view('layouts.home');
	}

	public function show($id)
	{
		$page = Page::where('slug', $id)->first();
		return view('pages.show')->with('page', $page);
	}
}
