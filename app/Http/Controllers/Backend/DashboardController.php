<?php

namespace App\Http\Controllers\Backend;

class DashboardController extends Controller
{
	public function index()
	{
		# code...
		return view('backend.dashboard');
	}
}
