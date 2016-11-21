<?php

namespace App\Abstract\Processable; 

abstract class Processable
{
    abstract function execute(); 
    abstract function getInfo(); 
}
