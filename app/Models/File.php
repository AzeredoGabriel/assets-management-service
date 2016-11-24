<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\FileService; 
use Hash; 

class File extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'size', 'extention' ];

    public function tags()
    {
        return $this->belongsToMany('App\Tag'); 
    }
   
    public function process($files, $processments)
    {   
      
        $file_service = new FileService(); 
        

        if (!$files || !$processments)
            throw new Exception("Argumentos $files e $processments estão faltando nessa função");
            

        $response = 
            $file_service->build([
                    "files"         => $files, 
                    "processments"  => $processments,
                    "project_hash"  => "Xasdelfkwjmj"
                ]); 

        return $response; 
    }
   
}
