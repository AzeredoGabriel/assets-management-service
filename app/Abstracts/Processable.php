<?php 

namespace App\Abstracts; 

abstract class Processable
{
	abstract function execute($file);
	abstract function getInfo();
}