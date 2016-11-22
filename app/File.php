<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'size', 'extention' ];

    public function process($files, $processments)
    {
        $processed_files = []; 
       
        $files = $this->build($files); 

        foreach ($processments as $key => $process) {
    
            $files = array_map(function($file) use ($process)
            {
                return $process->execute($file); 

            }, $files); 

        }

        /**
         * Processa os arquivos, salva fisicamente, salva na base de dados e devolve uma resposta para o usuário
         */

        return [
            "client_key"    => "AzlajXpoask",
            "file_path"     => "http://gab.ams.io/XseUyehAe", 
            "image_hash"    => "XseUyehAe", 
            "process_time"  => 325652365,
            "message"       => [
                "success"   => "Arquivos processados com sucesso!", 
                "error"     => ""
            ]
        ]; 
    }

    public function build($files)
    {
        // do something and return the files..
        
        return ['file1.pdf', 'file2.jpg']; 
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Tag'); 
    }
}
