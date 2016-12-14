<?php

namespace App\Services;

use Storage; 
use App\Models\File, App\Models\Project;
use Illuminate\Http\UploadedFile; 


class FileService
{

	/**
	 * Instância do modelo File
	 * @var App\Models\File
	 */
	protected $file_model; 


	public function __construct(
		File $file_model,
		File $project_model)
	{
		$this->file_model = $file_model; 
	}

	/**
	 * Executa a lógica de mover o arquivo para algumas pastas específicas;
	 * @param  UploadedFile $files 
	 * @param  string $folder Project key, também é usado como pasta do projeto.
	 * @return boolean Retona true e tudo ocorreu bem e false caso contrário. 
	 */
	public function move(UploadedFile $file, $folder)
	{	
		
		$folder_path 			= storage_path($folder); 
		$original_folder_path 	= $folder."/original/"; 
		$file_extension 		= $file->getClientOriginalExtension(); 
		$file_name 				= md5(uniqid(rand(), true)).".".$file_extension;

		if (!is_dir($folder_path))
			mkdir($folder_path, 0755); 

		if (!is_dir($original_folder_path))
			mkdir($original_folder_path, 0755); 			
		
		try {
			$file->storeAs($folder."/original/", $file_name); 
			$file->storeAs($folder, $file_name);  			
 		
 		} catch (Exception $e) {} 		
		
		return;  
	}

	/**
	 * Pega os parâmetros de um UploadedFile, cria uma instância do model File e persiste na base de dados. 
	 * @param UploadedFile $file
	 * @return Boolean
	 */
	public function add(UploadedFile $file, Project $project_model)
	{
		$file_model = new File; 

		try {
			
			$file_model->name 		= $file->getClientSize();
			$file_model->file_key 	= $file->getClientOriginalName(); //esse campo será alterado para original_name
			$file_model->size 		= $file->getClientSize();
			$file_model->extension 	= $file->getClientOriginalExtension();
			$file_model->name 		= $file->getClientSize();

		} catch (Exception $e) {}


		dd($file_model); 
		

	}

	/**
	 * Transforma os arquivos em um array de objetos UploadedFile do laravel.
	 * @param  array $files 
	 * @return array Retorna um array de objetos UploadedFile.
	 */
	public function transform($files)
	{
		if (!is_array($files))
			$files = [$files]; 

		return $files; 
	}	


}

