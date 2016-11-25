<?php

namespace App\Repositories;

use App\Models as Model; 
use App\Contracts; 

/**
 * Camada de repositório. 
 * Essa camada faz a interface entre o service e o modelo. 
 * Essa camada é repsonsável por imlementar uma interface padrão com metodos relacionados a dados. 
 */

class Project implements Contracts\DataRepository
{
	public function save()
	{}

	public function update()
	{}

	public function delete()
	{}

	public function get()
	{}

	public function getByName($name)
	{
		//tratar melhor essa parada
		return Model\Project::where('name', '=', $name)->first(); 
	}
}
