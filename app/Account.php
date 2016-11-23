<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function getContact()
    {
    	/**
    	 * TODO: 
    	 * Retorna o contato responsável pelo account
    	 */
    }

    public function getCompany()
    {
    	/**
    	 * TODO: 
    	 * Retona a empresa responsável pelo account, se tiver. 
    	 */
    }

    public function hasCompany()
    {
    	/**
    	 * TODO: 
    	 * Verifica se existe alguma empresa vinculada ao account.
    	 */
    }
}
