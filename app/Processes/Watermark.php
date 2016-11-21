<?php

namespace App\Processes\Watermark;

use App\Abstract\Processable; 

class Watermark extends Processable
{

    /**
     * métodos auxiliáres..
     * ===================================
     */

    public function execute()
    {
        return true; 
    }

    public function getInfo()
    {
        return "Alguma explicação em string sobre essa classe"; 
    }

}
