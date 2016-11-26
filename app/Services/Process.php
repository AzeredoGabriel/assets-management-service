<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model; 
use App\Contracts; 
use Storage; 

/**
 * TODO:
 * Comentar a classe e os métodos dela, com detalhes de funcionamento
 */

class Process
{

	public function execute($settings)
	{	

		$files 			= $settings['files']; 
		$tags 			= $settings['tags']; 
		$project_name	= $settings['project']; 
		$reponse 		= []; 

		$file			= new Model\File();
		$project		= new Model\Project();

		$processments 	= $this->getProcessments($tags); 
		$project 		= $project->getByName($project_name); 
		$files 			= $this->getArray($files); 

		/**
		 * TODO: 
		 * Continuar o debug dessa parte para finalizar o processamento de arquivos. 
		 */


		foreach ($processments as $key => $process) {
            
            $response[] = array_map(function($file) use ($process, $project) {
                
                $message = [
                	"file" 			=> $file, 
                	"processed"		=> !! $process->execute($file), 
                	"putted"		=> !! $this->put($file, $project->project_key), 
                	"saved"			=> $file_repo->save($file)
                ]; 

                return $message; 

            }, $files);
        }
  		
  		dd($response); 
        return $response; 
	}

	public function getProcessments($tags)
	{

    	$tag_service 	= new Service\Tag(); 
    	$process 		= new Model\Process(); 

    	if (!is_array($tags))
    		$tags = explode(",", $tags); 
    	

    	$tags 			= $tag_service->filter($tags); 
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
	}

	public function getArray($files)
	{
		if (!is_array($files))
			$files = [$files]; 

        return $files; 
	}

}
