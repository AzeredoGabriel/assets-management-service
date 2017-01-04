<?php

namespace App\Services;
use App\Contracts\Messager; 


//Objeto responsável por trafegar mensagens entre as classes da aplicação.
class MessageService implements Messager
{	

	public static $instance; 
	
	/**
	 * Array com os alerts default. 
	 * @var array
	 */
	public $message	= [
		"success" 	=> "", 
		"error" 	=> "", 
		"info" 		=> ""
	]; 

	protected function __construct()
    {}
	
	/**
	 * Obtém a única instância da classe. 
	 * @return Service\Message Retorna apenas uma instância da classe em 
	 * todo o ciclo de vida da aplicação. 
	 */
	public static function getInstance()
    {
        if (!self::$instance) 
            self::$instance = new static();
        
        return self::$instance;
    }

    /**
     * Preenche a mensagem de sucesso.
     * @param string $message
     */
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

	/**
	 * Preenche a mensagem de informação. 
	 * @param string $message 
	 */
	public function setInfo($message)
	{
		$this->message["info"] = $message; 
		$this->message["alert"]	= "info";	
	}

	/**
	 * Preenche uma mensagem qualquer.
	 * @param string $field   Campo identificador para a mensagem. 
	 * @param string $message Texto da mensagem. 
	 */
	public function setMessage($field, $message)
	{
		$this->message[$field] = $message; 
	}

	/**
	 * Obtém a mensagem como array. 
	 * @return array $message; 
	 */
	public function get()
	{
		return $this->message; 
	}

	/**
	 * Obtém a mensagem como json
	 * @return json $message
	 */
	public function getAPI()
	{
		return json_encode($this->message); 
	}
}
