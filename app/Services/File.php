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

	public function move($files, $folder)
	{	
		
		$files = $this->toArray($files); 

		if (!is_dir(storage_path($folder)))
			mkdir(storage_path($folder), 0777); 
		
		$success = true; 
		foreach ($files as $key => $file) {
			if (!$file->storeAs($folder, $file->getClientOriginalName()))
				$success = false; 		
		}
			
		return 	$success ? $files : false; 
	}

	public function toArray($files)
	{
		if (!is_array($files))
			$files = [$files]; 

        return $files; 
	}

}

