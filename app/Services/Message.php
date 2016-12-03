<?php

namespace App\Services;
use App\Contracts\Messager; 

class Message implements Messager
{	
	public static $instance; 
	
	public $message	= [
		"success" 	=> "", 
		"error" 	=> "", 
		"info" 		=> ""
	]; 

	protected function __construct()
    {
    }
	
	public static function getInstance()
    {
        if (!$instance) 
            $instance = new static();
        
        return $instance;
    }

	public function setSuccess($message)
	{
		$this->message["success"] 	= $message; 
		$this->message["alert"]		= "success";
	}

	public function setError($message)
	{
		$this->message["error"] = $message; 
		$this->message["alert"]	= "error";	
	}

	public function setInfo($message)
	{
		$this->message["info"] = $message; 
		$this->message["alert"]	= "info";	
	}

	public function setMessage($field, $message)
	{
		$this->message[$field] = $message; 
	}

	public function get()
	{
		return $this->message; 
	}

	public function getAPI()
	{
		return json_encode($this->message); 
	}
}
