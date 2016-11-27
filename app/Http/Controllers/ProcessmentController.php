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


	public function process(Request $req)
	{

		$inputs 			= $req->input(); 
		$inputs['domain'] 	= $req->getHost(); 

		if ($req->hasFile('files'))
			$inputs['files'] = $req->file('files');

		$settings = [
			"domain"	=> array_get($inputs, "domain"	, null), 
			"project"	=> array_get($inputs, "project"	, null), 
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];

		$process = new Service\Process(); 

		$message = $process->execute($settings); 
		
		return $message; 

	}


	public function rest(Request $req)
	{
		dd($req->all()); 
	}
}
