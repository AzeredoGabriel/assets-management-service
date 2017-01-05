<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProcessService,
	App\Services\TagService,
	App\Services\ProjectService,
	App\Services\FileService,
	App\Services\MessageService; 

class ProcessController extends Controller
{	

	public function index(Request $req)
	{
		return view('processments.index'); 
	}


	public function configurations(Request $req)
	{
		return view('processments.config'); 
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
			ProcessService $process_service, 
			ProjectService $project_service, 
			TagService 	$tag_service, 
			FileService $file_service, 
			Request $req)
	{

		$message_service = MessageService::getInstance(); 
		
		$inputs = $req->all(); 

		$get_params = [
			"domain"	=> $req->getHost(), 
			"key"		=> array_get($inputs, "project"	, "50cd0fa95639f1d0bd57af0b68f73633"), //trocar para key
			"files" 	=> array_get($inputs, "files"	, null), 
			"tags" 		=> array_get($inputs, "tags"	, null),
		];

		$project = 
			$project_service->getProjectByKey($get_params['key']); 

		if (!$project)
			return $message_service->setError("Desculpe, a chave do projeto não existe!");

		$valid_domain = 
			$project_service->validateDomain($project, $get_params['domain']); 

		if (!$valid_domain)
			return $message_service->setError("Desculpe, esse domínio não é válido para o projeto");			
		
		$tags = 
			$tag_service->filter($get_params['tags']); 

		$files = 
			$file_service->transform($get_params['files']); 
		
		if ($tags)
			$processments =	$process_service->getProcessments($tags); 
	
		foreach ($files as $key => $file) {

			$file_service->move($file, $project->project_key); 
			$file_service->add($file, $project); 

			dd("foi?"); 
			$process_service->execute($file, $processments);
		}

		return $message_service->getAPI(); 
	}

}
