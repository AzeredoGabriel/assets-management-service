<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
	{
		//$this->middleware('auth');
	}
	
    public function index(Request $req)
    {
    	return view('dashboards.index'); 
    }


	public function teste()
	{
		return $this->index(); 
	}

}
