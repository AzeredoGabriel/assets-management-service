<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Abstracts\Processable;
use App\Processes; 

class Process extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'class' ];


    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tag'); 
    }

  
    public function getProcessmentsByTags(array $tags)
    {
        $processments = array_map(function($tag) {
            return Tag::where('name', '=', $tag)
                ->first()
                ->processes()
                ->get();

        }, $tags); 

        return $processments; 
    }
}
