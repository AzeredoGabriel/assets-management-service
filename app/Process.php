<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Abstract\Processable;
use App\Processes; 

class Process extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'class' ];

    public function getProcessses( $tags )
    {
    	/**
    	 * Verifica na base de dados quais processos essas tags se referem.. 
    	 */
    	$arr_processments = [ 'Watermark' ]; 
    	
    	$processes = array_map(function($process)
		{
			if (class_exists($process)) 
			{
				$process = new $process; 

				if (!$process instanceof Processable)
				{
					// grava um log com essa informação.. 
					return false; 
				}

				return $process; 
			}
		}, 
		$arr_processments); 

    	return $processes; 
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Tag'); 
    }
}
