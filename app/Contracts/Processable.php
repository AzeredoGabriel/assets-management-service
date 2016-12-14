<?php 

namespace App\Contracts; 

interface Processable
{
	public function execute($file);
	public function getInfo();
}