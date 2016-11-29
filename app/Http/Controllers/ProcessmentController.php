<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services as Service;
use App\Traits as Trait;


class ProcessmentController extends Controller
{
	use Trait\Log; 

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
			"key"		=> array_get($inputs, "project"	, "aranda.com"), //trocar para key
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];

		$process_service	= new Service\Process(); 
		$project_service 	= new Service\Project(); 
		$file_service 		= new Service\File(); 
		$tag_service 		= new Service\Tag(); 

		/**
		 * Talvez troque essa classe por alguma outra coisa
		 * ==================================================
		 */
			$message = new Service\Message();  
		
		// ==================================================
		 

		$project = $project_service->getProjectByKey($settings['key'], $settings['domain']); 

		if (!$project) {
			$message->setError("Desculpe, a chave do projeto não existe");  
			return $message->getAPI(); 
		}

		/**
		 * Estamos aqui
		 * ====================
		 */

		$moved = $file_service->move($files, $project); 

		if (!$moved) {
			$message->setError("Por algum motivo não conseguimos mover o arquivo para a pasta especificada.");
			return $message->getAPI(); 
		}
		
		$tags = $tag_service->filter($settings['tags']); 
		
		if ($tags) {
			$processed = $process_service->process($files, $projects); 
			
			if ($processed){
				$message->setSuccess("Arquivos processados com sucesso!");
				return $message->getAPI();
			} else 	{
				$message->setError("Por algum motivo não conseguimos mover o arquivo para a pasta especificada.");
				return $message->getAPI();
			}
		}	

		$message->setSuccess("Arquivos salvos, porém, não existe processamento vinculado.");
		return $message->getAPI();
	}
}
