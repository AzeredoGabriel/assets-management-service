<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];


    public function getTags($str_tags)
    {
    	/**
    	 * Verifica se as tags são válidas com regex, database ou sei lá mais o que..
    	 */
    	
    	$tags = explode(',', $str_tags); 
    	return $tags; 
    }



	/**
	 * Relationships 
	 * ================================
	 */

    public function processes()
    {
    	return $this->belongsToMany('App\Process');
    }

}
