<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model; 
use App\Contracts; 
use Storage; 

class Process
{

	public function processFiles($settings)
	{

		$MessageService = Service\Message::getInstance();  

		$ProjectService = new Service\Project(); 
		$Project 		= $ProjectService->getProjectByKey($settings['key']); 

		if (!$Project)
			return $MessageService->setError("Desculpe, a chave do projeto não existe!");

		if (!$ProjectService->validateDomain($settings['domain']))
			return $MessageService->setError("Desculpe, o domínio enviado não é válido!");			
		
		$TagService		= new Service\Tag(); 
		$tags 			= $TagService->filter($settings['tags']); 

		$FileService 	= new Service\File(); 
		$files 			= $FileService->translate($files); 

		if ($tags)
			$processments= $this->getProcessments($tags); 

		foreach ($files as $key => $file) {
			$FileService->add($file, $Project->project_key); 
			
			$this->execute($file, $processments, $MessageService); 
		}

		return $MessageService; 
	}



	public function execute($file, $processments, $message)
	{	
	
		foreach ($processments as $key => $process) {
			
			try {

				$process->execute($file);             		

        	} catch (Exception $e) {
        		/**
        		 * TODO: 
        		 * Criar mensagens para erro. 
        		 */
        		echo $e->getMessage(); 
        	}            	
        }
  		
        return $response; 
	}

	public function getProcessments(array $tags)
	{
    	$process 		= new Model\Process(); 
    	$processaments 	= $process->getProcessmentsByTags($tags); 
    	$merged 		= $this->merge($processaments); 
    	$instances		= $this->getInstances($merged); 

    	return $instances; 
	}

	public function merge(array $processments)
	{
	
		$unique_processments = []; 

		foreach ($processments as $key => $processment) {
			foreach ($processment as $key => $process) {
				if (!in_array($process->name, $unique_processments)) {
					array_push($unique_processments, $process->name); 
				}
			}
		}

		return $unique_processments; 
	}

	public function getInstances(array $processments)
	{

		$processes = array_map(function($process) {
            $class_name = "App\\Processes\\{$process}"; 
    		
           	if (class_exists($class_name)) {
                $process = new $class_name;  
				
    			if (!$process instanceof Contracts\Processable) {
               		// grava um log com essa informação.. 
					throw new \Exception('Classe '.$class_name.' não é um processamento válido');
				}
    			
    			return $process; 
			}
	
        }, $processments); 

		$processes = array_filter($processes); 
	
        return $processes; 
	}

}
