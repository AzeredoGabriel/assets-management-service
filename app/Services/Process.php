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

	public function execute(array $files, array $tags, string $project_key)
	{	

		$response 		= []; 
		$processments 	= $this->getProcessments($tags); 

		foreach ($processments as $key => $process) {
			            
            array_map(function($file) use ($process) {
				
				try {
					$process->execute($file);             		
            	} catch (Exception $e) {
            		echo $e->getMessage(); 
            	}            	

            	return $message; 
            }, $files);
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
