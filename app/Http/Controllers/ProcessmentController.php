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

		if (!$req->hasFile('file'))
			return "redireciona para home com mensagem"; 

		if (!$req->input('tags'))
			return "redireciona para home com mensagem"; 


		$tag = new App\Tag(); 
		$file = new App\File(); 
		$process = new App\Process(); 

		$tags = $tag->getTags( $req->input('tags') ); 

		$processments = $process->getProcesses( $tags ); 

		$processment_response = 	
				$file->process( 
					$req->file('file'), 
					$processments 
				); 

		return view('processment.back', $processment_response); 
	}

}
