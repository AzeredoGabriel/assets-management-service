<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Abstracts\Processable;
use App\Processes; 

class Process extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'class' ];

    public function getProcesses($tags)
    {
    	/**
    	 * Verifica na base de dados quais processos essas tags se referem.. 
    	 */
    	$arr_processments = [ 'Watermark' ]; 
    	
    	$processes = array_map(function($process) {

            $class_name = "App\\Processes\\{$process}"; 
    
           	if (class_exists($class_name)) {
                $process = new $class_name;  
	
    			if (!$process instanceof Processable) {
               		// grava um log com essa informação.. 
					throw new \Exception('Classe '.$class_name.' não é um processamento válido');
				}
    
    			return $process; 
			}
	
        }, $arr_processments); 

    	return $processes; 
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Tag'); 
    }
}
