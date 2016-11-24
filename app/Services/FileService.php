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
                $message['saved'] 		= 	$this->save($file, $message['putted']); 
                
                return $message; 

            }, $files); 
        }
  		
        dd($response); 

        return $response; 
	}


	public function extract($files)
	{
		if (!is_array($files))
			$files = [$files]; 

        return $files; 
	}

	public function put($file, $hash)
	{
		return 	is_dir(storage_path('app/{$hash}')) ?
					Storage::move($file->realPath, $hash."/".$file->filename) :
					false; 
	}

	public function save($files)
	{
		/**
		 * salva no banco de dados
		 */
		
		return true; 
	}

}
