<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as Model; 


class ProcessmentController extends Controller
{

	public function index(Request $req)
	{
		return view('processment.index'); 
	}


	public function process(Request $req)
	{

		$inputs = $req->input(); 

		if ($req->hasFile('files'))
			$inputs['files'] = $req->file('files');
 

		$params = [
			"files" => array_get($inputs, "files", null), 
			"tags" => array_get($inputs, "tags", null), 
		];

		if (!$params['files'] || !$params['tags'])
			throw new \Exception("Algum parâmetro necessário para o processamento não foi enviado.");
	

		$tag = new Model\Tag(); 
		$file = new Model\File(); 
		$process = new Model\Process(); 

		$tags = $tag->getTags($params['tags']); 

		$processments = $process->getProcesses($tags); 

		$processment_response = 	
				$file->process( 
					$params['files'], 
					$processments 
				); 

		return "Processado com sucesso!";
	}
}
