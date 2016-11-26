<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    public function getByName($name)
	{
		//tratar melhor essa parada
		return self::where('name', '=', $name)->first(); 
	}
}
