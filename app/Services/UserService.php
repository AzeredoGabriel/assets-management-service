<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;

class UserService
{

	public function getUsers()
    {
    	return Model\User::all(); 
    }

}
