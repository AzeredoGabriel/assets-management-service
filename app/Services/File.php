<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;
use Storage; 


class File
{

	/**
	 * Executa a lógica de mover o arquivo para algumas pastas específicas;
	 * @param  UploadedFile $files 
	 * @param  string $folder Project key, também é usado como pasta do projeto.
	 * @return boolean Retona true e tudo ocorreu bem e false caso contrário. 
	 */
	public function move(UploadedFile $file, $folder)
	{	
		
		//TODO: 
		//Essa classe está errada, corrigir. 

		if (!is_dir(storage_path($folder)))
			mkdir(storage_path($folder), 0777); 
		
		$success = true; 
		foreach ($files as $key => $file) {
			if (!$file->storeAs($folder, $file->getClientOriginalName()))
				$success = false; 		
		}
			
		return 	$success ? $files : false; 
	}

	/**
	 * Transforma os arquivos em um array de objetos UploadedFile do laravel.
	 * @param  array $files 
	 * @return array Retorna um array de objetos UploadedFile.
	 */
	public function transform($files)
	{
		//TODO:
	}	


}

