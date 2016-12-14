<?php

namespace App\Processes;

use App\Contracts; 

class Watermark implements Contracts\Processable
{

    public function execute($file)
    {
        return true; 
    }

    public function getInfo()
    {
        return "Alguma explicação em string sobre essa classe"; 
    }

}
