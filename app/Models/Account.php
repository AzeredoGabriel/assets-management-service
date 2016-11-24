<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Models\Person'); 
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company'); 
    }

    public function hasCompany()    
    {
        return !! $this->company()->first(); 
    }
}
