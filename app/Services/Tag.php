<?php

namespace App\Services;
use App\Services as Service; 
use App\Models as Model;
use Storage; 

/**
 * Camada de aplicação. 
 * Essa camada é responsável por receber os parâmetros, verificar a validade deles e aplicar a lógica de negócio, pode acessar outros services
 */

class Tag
{

	public function filter($tags)
    {

    	if (!is_array($tags))
    		$tags = explode(",", $tags); 
    	
    	$tag = new Model\Tag(); 

    	$tags = array_map('trim', $tags); 

    	$valid_tags = array_filter($tags, function($tag){
    		return !! Model\Tag::where('name', '=', $tag)->first(); 
    	}); 

    	return $valid_tags; 
    }

}
