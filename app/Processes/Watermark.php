<?php

namespace App\Processes;

use App\Abstracts\Processable; 

class Watermark extends Processable
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
