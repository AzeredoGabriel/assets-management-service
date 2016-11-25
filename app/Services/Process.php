<?php

namespace App\Services;
use App\Services as Service; 
use App\Repositories as Repository;
use Storage; 

/**
 * Camada de aplicação. 
 * Essa camada é responsável por receber os parâmetros, verificar a validade deles e aplicar a lógica de negócio, pode acessar outros services
 */

class Process
{

	public function execute($settings)
	{	

		$process_repo 	= new Repository\Process();
		$project_repo 	= new Repository\Project();
		$file_repo 		= new Repository\File();
		$tag_service 	= new Service\Tag();

		$files 			= $settings['files']; 
		$tags 			= $settings['tags']; 
		$project		= $settings['project']; 
		
		$tags 			= $tag_service->getValidTags($tags); 
		$processments 	= $process_repo->getProcessments($tags); 
		$project 		= $project_repo->getByName($project); 
		$files 			= $this->extract($files); 

		foreach ($processments as $key => $process) {
            
            $response = array_map(function($file) use ($process, $project) {
                
                $message = [
                	"file" 			=> $file, 
                	"processed"		=> !! $process->execute($file), 
                	"putted"		=> !! $this->put($file, $project->project_key), 
                	"saved"			=> $file_repo->save($file)
                ]; 

                return $message; 

            }, $files);
        }
  		
        return $response; 
	}


	public function extract($files)
	{
		if (!is_array($files))
			$files = [$files]; 

        return $files; 
	}

	public function put($file, $folder)
	{	
		
		if (!is_dir(storage_path($folder)))
			mkdir(storage_path($folder), 0777); 
			
		return 	!! $file->storeAs($folder, $file->getClientOriginalName());
	}

}
