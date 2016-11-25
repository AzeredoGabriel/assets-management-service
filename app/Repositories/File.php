<?php

namespace App\Repositories;

use App\Contracts; 

/**
 * Camada de repositório. 
 * Essa camada faz a interface entre o service e o modelo. 
 * Essa camada é repsonsável por imlementar uma interface padrão com metodos relacionados a dados. 
 */

class File implements Contracts\DataRepository
{
	public function save($file)
	{}

	public function update()
	{}

	public function delete()
	{}

	public function get()
	{}

	public function getFileInfo()
	{

	}
}
