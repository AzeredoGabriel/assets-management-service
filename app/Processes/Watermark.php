<?php

namespace App\Processes;

use App\Contracts\Processable; 

class Watermark implements Processable
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
