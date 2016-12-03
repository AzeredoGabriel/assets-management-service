<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services as Service;


class ProcessmentController extends Controller
{	

	public function index(Request $req)
	{
		return view('processment.index'); 
	}

	public function form_direct_url(Request $req)
	{
		$inputs = $req->all(); 
		
		$get_params = [
			"domain"	=> $req->getHost(), 
			"key"		=> array_get($inputs, "project"	, "7cc2f5edf9496cf255d8c2593f6040f0"), //trocar para key
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];

		$ProcessService = new Service\Process(); 
		$message		= $ProcessService->processFiles($get_params);

		if (!$message instanceof Messager)
			throw new Exception("Retorno do método processFiles não é uma instância de Messager");

		return $message->getAPI(); 
			 	 	
	}
}
