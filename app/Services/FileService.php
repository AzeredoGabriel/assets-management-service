<?php

namespace App\Services;
use Storage; 

class FileService
{
	

	public function build($settings)
	{	

		$files 			= $settings['files']; 
		$processments 	= $settings['processments']; 
		$hash			= $settings['project_hash']; 

		$files = $this->extract($files); 

		foreach ($processments as $key => $process) {
            
            $response = array_map(function($file) use ($process, $hash) {
                
                $message = [
                	"file" => $file
                ]; 
                
                $message['processed'] 	= 	!! $process->execute($file); 
                $message['putted'] 		= 	!! $this->put($file, $hash); 
                
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
		
		if (!is_dir(storage_path('app/'.$folder)))
			mkdir(storage_path('app/'.$folder), 0777); 
			
		return 	!! $file->storeAs($folder, $file->getClientOriginalName());
	}

}
