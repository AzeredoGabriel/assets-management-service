<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer'); 
	}
	
	//TODO:
	// Criar model domain

	public function domains()
	{
		return $this->belongsTo('App\Models\Domain'); 
	}

    public function getByKey($key)
	{
		return Project::where('project_key', '=', $key)->first(); 
	}



}
