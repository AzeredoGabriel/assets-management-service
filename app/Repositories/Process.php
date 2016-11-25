<?php

namespace App\Repositories;

use App\Models; 
use App\Contracts; 

/**
 * Camada de repositório. 
 * Essa camada faz a interface entre o service e o modelo. 
 * Essa camada é repsonsável por imlementar uma interface padrão com metodos relacionados a dados. 
 */

class Process implements Contracts\DataRepository
{
	public function save($item)
	{}

	public function update()
	{}

	public function delete()
	{}

	public function get()
	{}

	public function getProcessments(array $tags)
	{
		/**
    	* Verifica na base de dados quais processos essas tags se referem.. 
    	*/
    	
    	$arr_processments = [ 'Watermark' ]; 
    	
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
	
        }, $arr_processments); 
    	
    	return $processes; 
	}
}
