<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function account()
    {
    	return $this->hasOne('App\Account'); 
    }
}
