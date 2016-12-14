<?php 

namespace App\Contracts; 

interface Messager
{
	public function setSuccess($message); 
	public function setError($message); 
	public function setInfo($message); 
	public function setMessage($key, $message); 
	public function get(); 
	public function getAPI(); 
}