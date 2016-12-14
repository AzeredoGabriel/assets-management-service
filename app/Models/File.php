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
    protected $hidden   = ['tmp_path']; 

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag'); 
    }
   
}
