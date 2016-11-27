<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as Model; 
use App\Services as Service;



class ProcessmentController extends Controller
{

	public function index(Request $req)
	{
		return view('processment.index'); 
	}


	public function form_direct_url(Request $req)
	{
		$inputs 			= $req->all(); 
		$inputs['domain'] 	= $req->getHost(); 
		
		$settings = [
			"domain"	=> array_get($inputs, "domain"	, null), 
			"project"	=> array_get($inputs, "project"	, "vieira.net"), 
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];

		$process = new Service\Process(); 

		$message = $process->execute($settings); 
		
		return $message; 
	}
}
