<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;
use Storage; 

/**
 * Camada de aplicação. 
 * Essa camada é responsável por receber os parâmetros, verificar a validade deles e aplicar a lógica de negócio, pode acessar outros services
 */

class File
{

	public function put($file, $folder)
	{	
		
		if (!is_dir(storage_path($folder)))
			mkdir(storage_path($folder), 0777); 
			
		return 	!! $file->storeAs($folder, $file->getClientOriginalName());
	}

	public function toArray($files)
	{
		if (!is_array($files))
			$files = [$files]; 

        return $files; 
	}

	public function add($file)
	{
		
	}

}

