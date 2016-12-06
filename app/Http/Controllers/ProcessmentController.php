<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Service\Process,
	Service\Tag,
	Service\Project,
	Service\File,
	Service\Message; 

class ProcessmentController extends Controller
{	

	/**
	 * Página principal do projeto.
	 * 
	 * @param  Request $req 
	 * @return [view]       Retorna a view index.
	 */
	public function index(Request $req)
	{
		return view('processment.index'); 
	}

	/**
	 * Executa os processamentos para arquivos enviados via URL direta. 
	 *
	 * @param  Message $message_service [Instância de Service\Message]
	 * @param  Process $process_service [Instância de Service\Process]
	 * @param  Project $project_service [Instância de Service\Project]
	 * @param  Tag     $tag_service     [Instância de Service\Tag]
	 * @param  File    $file_service    [Instância de Service\File]
	 * @return json    Retorna a resposta do processamento em json.
	 */
	public function form_direct_url(
			Message $message_service,
			Process $process_service, 
			Project $project_service, 
			Tag 	$tag_service, 
			File 	$file_service)
	{

		$inputs = $req->all(); 
		
		$get_params = [
			"domain"	=> $req->getHost(), 
			"key"		=> array_get($inputs, "project"	, "7cc2f5edf9496cf255d8c2593f6040f0"), //trocar para key
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];


		$project = 
			$project_service->getProjectByKey($get_params['key']); 

		if (!$project)
			return $message_service->setError("Desculpe, a chave do projeto não existe!");

		$valid_domain = 
			$project_service->validateDomain($get_params['domain']); 

		if (!$valid_domain)
			return $message_service->setError("Desculpe, esse domínio não é válido para o projeto");			
		
		$tags = 
			$tag_service->filter($settings['tags']); 

		$files = 
			$file_service->transform($files); 

		if ($tags)
			$processments =	$this->getProcessments($tags); 


		foreach ($files as $key => $file) {
			$file_service->move($file, $project->project_key); 
			$file_service->add($file, $project); 
			$process_service->execute($file, $processments)
		}

		return $message_service->getAPI(); 
	}
}
