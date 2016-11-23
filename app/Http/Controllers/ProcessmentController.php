<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App; 

class ProcessmentController extends Controller
{

	public function index(Request $req)
	{
		return view('processment.index'); 
	}


	public function process(Request $req)
	{

		$inputs = $req->input(); 

		$params = [
			"files" => array_get($inputs, "file", null), 
			"tags" => array_get($inputs, "tags", null), 
		];

		if (!$params['files'] || !$params['tags'])
			throw new Exception("Algum parâmetro necessário para o processamento não foi enviado.");
	

		$tag = new App\Tag(); 
		$file = new App\File(); 
		$process = new App\Process(); 

		$tags = $tag->getTags($req->input('tags')); 

		$processments = $process->getProcesses($tags); 

		$processment_response = 	
				$file->process( 
					$params['files'], 
					$processments 
				); 

		return view('processment.back', $processment_response); 
	}
}
