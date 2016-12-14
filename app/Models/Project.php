<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer'); 
	}
	
	public function domains()
	{
		return $this->hasMany('App\Models\Domain'); 
	}

    public function getByKey($key)
	{
		return Project::where('project_key', '=', $key)->first(); 
	}



}
