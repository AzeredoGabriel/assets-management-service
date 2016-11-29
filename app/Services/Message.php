<?php

namespace App\Services;


trait Message
{	
	public $message		= ["success" => "", "error" => ""]; 

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
