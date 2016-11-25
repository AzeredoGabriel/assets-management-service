<?php 

namespace App\Contracts; 

interface DataRepository
{
	public function save($item); 
	public function update(); 
	public function delete(); 
	public function get(); 
}