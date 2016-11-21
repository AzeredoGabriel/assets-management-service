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

    public function tags()
    {
    	return $this->belongsToMany('App\Tag'); 
    }
}
