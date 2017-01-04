<?php

namespace App\Services;

use App\Models\Process,
	App\Models\Tag,
	App\Models\Project,
	App\Models\File;

use App\Contracts\Processable; 


class ProcessService
{

	protected $process_model; 

	protected $tag_model; 

	protected $project_model; 

	protected $file_model; 

	
	public function __construct(
		Process $process_model,	
		Project	$project_model,	
		File $file_model,	
		Tag $tag_model)
	{
		$this->process_model 	= $process_model;
		$this->project_model 	= $project_model;
		$this->file_model 		= $file_model;
		$this->tag_model 		= $tag_model;
	}

	/**
	 * Executa os processamentos para cada arquivo.
	 * 
	 * @param  UploadedFile $file  [Arquivo do tipo UploadedFile]
	 * @param  Array $processments [Array de processamentos (classes do com a interface Processable)]
	 * @return Service\Message     [Retorna uma mensagem.]
	 */
	public function execute($file, $processments, $message)
	{	
		/**
		 * TODO: 
		 * Melhorar método de processamento e criar mensagem de erro utilizando Service\Message. 
		 */

		foreach ($processments as $key => $process) {
			
			try {

				$process->execute($file);             		

        	} catch (Exception $e) {
        		echo $e->getMessage(); 
        	}            	
        }
  		
        return $response; 
	}

	/**
	 * Obtém os processamentos (Processable) vinculados as tags passadas.
	 * @param  array  $tags 
	 * @return array  Retorna um array de instâncias Processable
	 */
	public function getProcessments(array $tags)
	{
    	$processaments 	= $this->process_model->getProcessmentsByTags($tags); 
    	$merged 		= $this->merge($processaments); 
    	$instances		= $this->getInstances($merged); 

    	return $instances; 
	}

	/**
	 * Une processamentos para retirar classes repetidas
	 * @param  array  $processments Array de processamentos
	 * @return array  Retorna um array de processamentos únicos.
	 */
	private function merge(array $processments)
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

	/**
	 * Obtém os objetos Processable, a partir de um array de nomes de processamentos.
	 * @param  array  $processments Array com nomes de processamentos válidos
	 * @return array  Retona um array de instâncias Processable.
	 */
	private function getInstances(array $processments)
	{

		$processes = array_map(function($process) {
            $class_name = "App\\Processes\\{$process}"; 
    		
           	if (class_exists($class_name)) {
                $process = new $class_name;  
				
    			if (!$process instanceof Processable) {
               		throw new \Exception('Classe '.$class_name.' não é um processamento válido');
				}
    			
    			return $process; 
			}
	
        }, $processments); 

		$processes = array_filter($processes); 
	
        return $processes; 
	}

}
